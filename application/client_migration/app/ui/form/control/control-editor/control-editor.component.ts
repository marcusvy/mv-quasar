import { Subscription } from 'rxjs/Subscription';
import { DomSanitizer } from '@angular/platform-browser';
import { ControlEditorAreaDirective } from './control-editor-area.directive';
import { Component, OnInit, Renderer2, ViewChild, ElementRef, Input, AfterViewInit, SecurityContext, OnDestroy } from '@angular/core';
import { AbstractControl } from '../abstract-control';
import { QuillFullModules } from './quill/full-modules';
// import { Quill, QuillOptionsStatic, StringMap } from 'quill';
// import * as QuillFactory from 'quill';

import { BehaviorSubject } from 'rxjs/BehaviorSubject';

@Component({
  selector: 'mv-control-editor',
  templateUrl: './control-editor.component.html',
  styleUrls: [
    './control-editor.component.scss',
    './control-editor.theme.scss',
  ]
})
export class ControlEditorComponent
  extends AbstractControl
  implements OnInit, AfterViewInit, OnDestroy {

  quillFactory: any;
  @Input() value = '';
  @Input() placeholder: string = '';
  @Input() disabled = false;
  @Input() required = false;
  errorInvalid = false;

  @ViewChild('controlEditorArea') quillElement: ElementRef;
  private quillEditor: any;
  @Input() readonly = false;
  @Input() theme = 'snow'; // snow, core, bubble
  @Input() modules: 'full' | any = {};
  @Input() config: any;
  @Input() output: 'text' | 'html' = 'html';
  invalidOptionsMessage;
  private $canInitialize: Subscription;
  private canInitialize: BehaviorSubject<boolean> = new BehaviorSubject(false);

  constructor(
    protected _renderer: Renderer2,
    private _sanitize: DomSanitizer
  ) {
    super(_renderer);
    if (!window) {
      console.warn('Quill not registered');
    }
    this.quillFactory = window['Quill'];
  }

  ngOnInit() {
    this.setupInitalValue();
    this.validateOptions();
    this.$canInitialize = this.canInitialize.asObservable().subscribe(ci => {
      if (ci) {
        this.setupQuill();
        this.initQuill();
      }
    });
  }

  ngOnDestroy() {
    this.$canInitialize.unsubscribe();
  }

  ngAfterViewInit(): void {
    if(this.quillFactory !== undefined) {
      this.canInitialize.next(true);
    }
  }

  get isCanInitialized () {
    return (this.canInitialize instanceof BehaviorSubject) ? this.canInitialize.getValue() : false;
  }

  private validateOptions() {
    if (this.output !== 'text', this.output !== 'html') {
      this.invalidOptionsMessage = `The output value is only: 'text' or 'html'. Fix [output='${this.output}']`;
      this.canInitialize.next(false);
    }
  }

  setupInitalValue() {
    this.value = this._control.value;
  }

  setupQuill() {
    let quillModules = (this.modules !== 'full') ? this.modules : QuillFullModules;
    this.config = {
      modules: quillModules,
      placeholder: this.placeholder,
      readOnly: this.readonly,
      theme: this.theme,
      bounds: document.body,
    };
  }

  initQuill() {
    this.quillEditor = new this.quillFactory(this.quillElement.nativeElement, Object.assign(this.config));

    // write
    if (this.value) {
      const valueSanitized = this._sanitize.sanitize(SecurityContext.HTML, this.value);
      this.quillEditor.clipboard.dangerouslyPasteHTML(valueSanitized);
    }

    this.quillEditor.on('selection-change', (range) => {
      if (!range) {
        this.onTouch(true);
      }
    });

    this.quillEditor.on('text-change', (delta, oldDelta, source) => {
      let output = '';
      switch (this.output.toLowerCase()) {
        case 'text':
          output = this.quillEditor.getText();
          break;
        case 'html':
          const html = this.quillElement.nativeElement.children[0].innerHTML;
          output = this._sanitize.sanitize(SecurityContext.HTML, html);
          if (output === '<p><br></p>') { output = ''; }
          break;
      }
      this.onInput(output);
    });
  }

  onInput(html: string) {
    this._value.next(html);
    this.errorInvalid = this._control.invalid;
  }

  onFocus(result: boolean) {
    this._touch.next(result);
  }

  onTouch(result: boolean) {
    this._touch.next(result);
  }

}

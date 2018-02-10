import { Component, OnInit, Renderer2, ViewChild, ElementRef, Input } from '@angular/core';
import { AbstractControl } from '../abstract-control';

@Component({
  selector: 'mv-control-file',
  templateUrl: './control-file.component.html',
  styleUrls: [
    './control-file.component.scss',
    './control-file.theme.scss',
  ]
})
export class ControlFileComponent
  extends AbstractControl {

  @ViewChild('formControl') formControl: ElementRef;
  @Input() value = '';
  @Input() type: string = 'text';
  @Input('id') _id: string = '';
  @Input() multiple: boolean = false;
  @Input() accept: string;
  @Input() placeholder: string = '';
  @Input() disabled = false;
  @Input() required = false;
  @Input() ariaDescribedby;
  @Input() ariaLabelledby;

  // files: { file: File, reader: string}[] = [];
  files: File[] = [];

  // @Input('class') classCss = null;
  errorInvalid = false;

  constructor(_renderer: Renderer2) {
    super(_renderer);
  }

  get id() {
    return this._id.concat(this._gen);
  }

  setupInitalValue() {
    // this.value = this._control.value;
  }

  onClick() {
    this._renderer.selectRootElement(this.formControl.nativeElement).click();
  }

  onChange(event: any) {
    this.populateFiles(event.target.files);
    this.onUpload();
  }

  onFocus(result: boolean) {
    this._touch.next(result);
  }

  onUpload() {
    this._value.next(this.files);
    this.errorInvalid = this._control.invalid;
  }

  private populateFiles(files: FileList) {
    for (let $x = 0; $x < files.length; $x++) {
      let file = files.item($x);
      this.files.push(file);
    }
  }
}

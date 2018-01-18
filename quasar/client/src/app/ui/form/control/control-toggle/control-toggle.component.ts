import {
  AfterContentInit,
  Component,
  ElementRef,
  HostBinding,
  Input,
  OnInit,
  ViewChild,
  QueryList,
  Renderer2,
  ContentChildren,
} from '@angular/core';
import { ControlValueDirective } from '../control-value.directive';
import { AbstractControl } from '../abstract-control';

@Component({
  selector: 'mv-control-toggle',
  templateUrl: './control-toggle.component.html',
  styleUrls: [
    './control-toggle.component.scss',
    './control-toggle.theme.scss',
  ]
})
export class ControlToggleComponent
  extends AbstractControl
  implements AfterContentInit {

  @ViewChild('formControl') formControl: ElementRef;
  @ContentChildren(ControlValueDirective) controlValue: QueryList<ControlValueDirective>;
  @Input('id') _id: string = '';
  @Input() disabled = false;
  @Input() required = false;
  @Input() checked = true;

  constructor(_renderer: Renderer2) {
    super(_renderer);
  }

  ngAfterContentInit() {
    this.showControlValue();
  }

  get id() {
    return this._id.concat(this._gen);
  }

  showControlValue() {
    if (this.controlValue !== undefined) {
      this.controlValue
        .map(control => { control.hidden = true; return control; })
        .filter(control => control.attrFor === this.checked)
        .map(control => { control.hidden = false });
    }
  }

  setupInitalValue() {
    this.checked = this._control.value;
  }

  onChange(event: any) {
    let element: any = event.target;
    this.checked = element.checked;
    this._value.next(this.checked);
    this.showControlValue();
  }

  onClick(event) {
    this.checked = (this.checked) ? false : true;
    let value = (this.checked) ? 'checked' : null;
    this._renderer.setAttribute(this.formControl.nativeElement, 'checked', value);
    this._value.next(this.checked);
    this.showControlValue();
  }

  onFocus(result: boolean) {
    this._touch.next(result);
  }

  @HostBinding('attr.aria-pressed')
  get ariaPressed() {
    return this.checked;
  }

  get icon() {
    return (this.checked) ? 'toggle-on' : 'toggle-off';
  }
}

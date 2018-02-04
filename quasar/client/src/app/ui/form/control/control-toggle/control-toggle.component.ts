import {
  Component,
  ElementRef,
  HostBinding,
  Input,
  ViewChild,
  QueryList,
  Renderer2,
  ContentChildren,
} from '@angular/core';
import {ControlValueDirective} from '../control-value.directive';
import {AbstractControl} from '../abstract-control';

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
{

  @ViewChild('formControl') formControl: ElementRef;
  @ContentChildren(ControlValueDirective) controlValue: QueryList<ControlValueDirective>;
  @Input('id') _id = '';
  @Input() disabled = false;
  @Input() required = false;
  @Input() checked = true;

  constructor(_renderer: Renderer2) {
    super(_renderer);
  }

  get id() {
    return this._id.concat(this._gen);
  }

  setupInitalValue() {
    this.checked = this._control.value;
  }

  onChange(event: any) {
    this.checked = event.target.checked;
    this._value.next(this.checked);

  }

  onClick(event) {
    this.checked = !(this.checked);
    const value = (this.checked) ? 'checked' : null;
    this._renderer.setAttribute(this.formControl.nativeElement, 'checked', value);
    this._value.next(this.checked);
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

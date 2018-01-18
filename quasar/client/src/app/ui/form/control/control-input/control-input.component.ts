import { Component, Input, OnInit, ViewChild, Renderer2, ElementRef } from '@angular/core';
import { AbstractControl } from '../abstract-control';

@Component({
  selector: 'mv-control-input',
  templateUrl: './control-input.component.html',
  styleUrls: ['./control-input.component.scss']
})
export class ControlInputComponent extends AbstractControl {

  @ViewChild('formControl') formControl: ElementRef;
  @Input() value = '';
  @Input() type:string = 'text';
  @Input('id') _id:string = '';
  @Input() placeholder:string = '';
  @Input() disabled = false;
  @Input() required = false;
  @Input() minlength;
  @Input() maxlength;
  @Input() ariaDescribedby;
  @Input() ariaLabelledby;
  @Input('class') classCss = null;
  errorInvalid = false;

  constructor(_renderer: Renderer2) {
    super(_renderer);
  }

  get id() {
    return this._id.concat(this._gen);
  }

  setupInitalValue() {
    this.value = this._control.value;
  }

  onInput(event: any) {
    let element: any = event.target;
    let value = element.value;
    this._value.next(value);
    this.errorInvalid = this._control.invalid;
  }

  onFocus(result: boolean) {
    this._touch.next(result);
  }
}

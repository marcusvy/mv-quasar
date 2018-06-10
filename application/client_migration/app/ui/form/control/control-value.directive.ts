import {Directive, Input, OnInit, HostBinding, ElementRef} from '@angular/core';
import {AbstractControl} from '@angular/forms';

@Directive({
  selector: '[mvControlValue]'
})
export class ControlValueDirective {

  @Input('for')
  hidden = true;

  @HostBinding('class.is-hidden')
  get isHidden() {
    return !this.hidden;
  }

}

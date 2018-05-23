import { Directive, forwardRef, Attribute } from '@angular/core';
import { Validator, AbstractControl, NG_VALIDATORS } from '@angular/forms';


@Directive({
  selector: '[mvCounter][ngModel],[mvCounter][formControlName],[mvCounter][formControl],',
  providers: [
    { provide: NG_VALIDATORS, useExisting: forwardRef(() => MvCounterDirective), multi: true }
  ]
})
export class MvCounterDirective implements Validator {

  constructor(
    @Attribute('counter-max') public max: number,
    @Attribute('counter-min') public min: number
  ) { }


  validate(c: AbstractControl): { [key: string]: any } {
    let text = c.value;
    let max = (this.max) ? this.max : 0;
    let min = (this.min) ? this.min : 0;


    if (typeof text === 'string') {
      text.trim();

      let counter = text.length > 0 ? text.split(/\s+/).length : 0;
      let validationMax = (counter <= max);
      let validationMin = (counter >= min);

      if (this.min >= this.max) {
        return {
          counter: 'Valor mínimo deve ser menor que máximo'
        }
      }

      if (!validationMax || !validationMin) {
        return {
          counter: {
            max: !validationMax,
            min: !validationMin
          }
        };
      }
    }
    return null
  }

}

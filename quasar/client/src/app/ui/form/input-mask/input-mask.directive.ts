import { Directive, ElementRef, Renderer2, forwardRef, OnDestroy, OnInit, Input, AfterViewInit } from '@angular/core';
import { ControlValueAccessor, NG_VALUE_ACCESSOR } from '@angular/forms';
import { InputMaskService } from './input-mask.service';
import { InputMaskHandler } from './input-mask-handler';
import { InputMaskMoneyOptions } from './input-mask-money-options';
import * as VMasker from 'vanilla-masker';

@Directive({
  selector: '[mvInputMask]',
  host: {
    '(blur)': 'onBlur()',
    '(input)': 'onInput($event)',
  },
  providers: [{
    provide: NG_VALUE_ACCESSOR,
    useExisting: forwardRef(() => InputMaskDirective),
    multi: true
  }],
})
export class InputMaskDirective
  implements ControlValueAccessor, OnDestroy, AfterViewInit {

  @Input('mvInputMask') maskPattern: string | InputMaskMoneyOptions = '';
  @Input('mvInputMaskHandler') handler: InputMaskHandler;
  @Input() pattern: string;

  onChange: any = (_: any) => { };
  onTouched: any = () => { };

  constructor(
    private _element: ElementRef,
    private _renderer: Renderer2,
    private _service: InputMaskService
  ) { }

  ngOnDestroy(): void {
    VMasker(this._element.nativeElement).unMask();
  }

  ngAfterViewInit(){
    this.mask();
  }

  onInput(event) {
    this.mask();
    this.onChange(event.target.value);
  }

  onBlur(){
    this.mask();
    this.onTouched();
  }

  mask() {
    if (this.maskPattern !== undefined) {
      this.maskByPattern();
    }
    if (this.handler instanceof Function) {
      if (this.pattern !== undefined) {
        this.handler(this._element.nativeElement, VMasker, this.pattern);
      } else {
        this.handler(this._element.nativeElement, VMasker);
      }
    }
    if (this.pattern !== undefined) {
      VMasker(this._element.nativeElement).maskPattern(this.pattern);
    }
  }

  maskByPattern() {
    if (typeof this.maskPattern === 'string') {
      if (typeof this._service[this.maskPattern] === 'function') {
        if(this.handler===undefined){
          this.handler = this._service[this.maskPattern];
        }
      }
    }
  }

  writeValue(obj: any): void {
    const normalizedValue = obj == null ? '' : obj;
    this._renderer.setProperty(this._element.nativeElement, 'value', normalizedValue);
  }
  registerOnChange(fn: any): void {
    this.onChange = fn;
  }
  registerOnTouched(fn: any): void {
    this.onTouched = fn;
  }
  setDisabledState(isDisabled: boolean): void {
    this._renderer.setProperty(this._element.nativeElement, 'disabled', isDisabled);
  }
}

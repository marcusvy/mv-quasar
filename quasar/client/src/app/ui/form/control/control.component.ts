import {
  AfterContentInit,
  Component,
  ContentChild,
  forwardRef,
  Host,
  Input,
  OnDestroy,
  OnInit,
  Optional,
  SkipSelf
} from '@angular/core';
import {
  AbstractControl,
  ControlContainer,
  ControlValueAccessor,
  FormArray,
  FormControl,
  FormGroup,
  NG_VALUE_ACCESSOR,
} from '@angular/forms';

import { ControlDirective } from './control.directive';
import { ControlErrorComponent } from './control-error/control-error.component';

import { Subscription } from 'rxjs/Subscription';

@Component({
  selector: 'mv-control',
  templateUrl: './control.component.html',
  styleUrls: [
    './control.component.scss',
    './control.theme.scss',
  ],
  providers: [{
    provide: NG_VALUE_ACCESSOR,
    useExisting: forwardRef(() => ControlComponent),
    multi: true
  }],
})
export class ControlComponent
  implements OnInit, ControlValueAccessor {

  private _valueSubscription:Subscription;
  private _touchSubscription:Subscription;
  private _value: any;
  private control: AbstractControl|null;
  @Input() formControlName: string;
  @Input() icon:string = '';
  @ContentChild(ControlDirective) private controlDirective: ControlDirective;
  @ContentChild(ControlErrorComponent) private controlError: ControlErrorComponent;

  onChange: any = (_) => { };
  onTouched: any = () => { };

  constructor(
    @Optional() @Host() @SkipSelf() private parent: ControlContainer
  ) { }

  ngOnInit() {
    this.onChange('initial');
    if (this.controlDirective !== undefined) {
      this.registerControl();
      this.registerControlError(this.control);
      this.subscribeValue();
      this.subscribeTouch();
    }
  }

  ngOnDestroy(): void {
    this.unsubscribeValue();
    this.unsubscribeTouch();
  }

  get value() {
    return this._value;
  }

  set value(obj) {
    this._value = obj;
  }

  get name() {
    return this.formControlName;
  }

  hasIcon() {
    return (this.icon.length > 0);
  }

  writeValue(obj: any): void {
    if (obj !== undefined) {
      this.value = obj;
    }
  }

  registerOnChange(fn: (_: any) => void): void {
    this.onChange = fn;
  }

  registerOnTouched(fn: () => void): void {
    this.onTouched = fn;
  }

  private registerControl() {
    this.control = this.parent.control.get(this.formControlName);
    this.controlDirective.registerControl(this.control);
  }

  private registerControlError(control) {
    if (this.controlError !== undefined && control !== undefined) {
      this.controlError.registerControl(control);
    }
  }

  private subscribeValue() {
    this._valueSubscription = this.controlDirective
      .valueChanges
      .skip(1)
      .filter(value => value !== undefined)
      .subscribe(value => {
        this.value = value;
        this.onChange(this.value);
      });
  }

  private unsubscribeValue() {
    if (this._valueSubscription) {
      this._valueSubscription.unsubscribe();
    }
  }

  private subscribeTouch() {
    this._touchSubscription = this.controlDirective
      .touchChanges
      .filter(value => typeof (value) === 'boolean')
      .subscribe(value => {
        if (value) {
          this.onTouched();
        }
      });
  }

  private unsubscribeTouch() {
    if (this._touchSubscription) {
      this._touchSubscription.unsubscribe();
    }
  }

}

import { Directive, OnInit, Output, EventEmitter, HostBinding, ViewContainerRef } from '@angular/core';
import { AbstractControl } from '@angular/forms';
import { Control } from './control';

import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import { Observable } from 'rxjs/Observable';

@Directive({
  selector: '[mvControl]',
})
export class ControlDirective implements OnInit {

  private _control: AbstractControl;
  private _componentInstance: any;
  private _value = new BehaviorSubject('');
  private _touch = new BehaviorSubject(null);

  constructor(private _view: ViewContainerRef) { }

  ngOnInit() {
    this.propagate();
  }

  /**
   * Prepare and register control necessary to propagate to component
   *
   * @param {any} control
   * @memberof ControlDirective
   */
  registerControl(control) {
    this._control = control;
  }

  /**
   * Propagate the FormControl from Form to Component
   *
   * @memberof ControlDirective
   */
  propagate() {
    if (this._view['_data'].componentView !== undefined) {
      this._componentInstance = this._view['_data'].componentView.component;
      this._componentInstance.registerControl(this._control);
      this._componentInstance.registerValueChanges(this._value);
      this._componentInstance.registerTouchChanges(this._touch);
    }
  }

  get valueChanges(){
    return this._value.asObservable();
  }

  get touchChanges(){
    return this._touch.asObservable();
  }

}

import { Renderer2, ElementRef, ViewChild, Input, OnDestroy } from '@angular/core';
import { AbstractControl as ngAbstractControl } from '@angular/forms';
import { Control } from './control';
import { RandomIdGenerator } from '../../core/utils/random-id-generator';

import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import { Observable } from 'rxjs/Observable';


export class AbstractControl
  implements Control {

  protected _value: BehaviorSubject<any>;
  protected _touch: BehaviorSubject<any>;
  protected _control: ngAbstractControl;
  protected _renderer: Renderer2;
  protected _gen: string;

  constructor(_renderer: Renderer2) {
    this._renderer = _renderer;
    this._gen = (new RandomIdGenerator()).random;
  }

  ngOnInit() {
    this.setupInitalValue();
  }

  setupInitalValue() {
    throw new Error("Method not implemented.");
  }

  registerControl(control: ngAbstractControl): void {
    this._control = control;
  }

  registerValueChanges(subject: BehaviorSubject<any>) {
    this._value = subject;
  }

  registerTouchChanges(subject: BehaviorSubject<any>) {
    this._touch = subject;
  }
}

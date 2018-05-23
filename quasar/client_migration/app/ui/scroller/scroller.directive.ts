import { Directive, OnInit, ElementRef } from '@angular/core';

@Directive({
  selector: '[mvScroller]',
  host: {
    '[class.is-scroller-on]': 'isOn()',
    '[class.is-scroller-off]': 'isOff()',
  }
})
export class ScrollerDirective {

  _status: 'on' | 'off';
  constructor(private el: ElementRef) { }

  get status() {
    return this._status;
  }

  set status(value:'on'|'off') {
    this._status = value;
  }

  isOn() {
    return this.status === 'on';
  }

  isOff() {
    return this.status === 'off';
  }

  setOn() {
    return this.status = 'on';
  }
  
  setOff() {
    return this.status = 'off';
  }

  calcHeight():number {
    let element: HTMLElement = this.el.nativeElement;
    return element.offsetHeight;
  }
}

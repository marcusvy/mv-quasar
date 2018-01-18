import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import { Injectable } from '@angular/core';

@Injectable()
export class MenuDropdownService {

  private _visible: BehaviorSubject<boolean>;

  constructor() {
    this._visible = new BehaviorSubject(false);
  }

  get visible() {
    return this._visible.asObservable();
  }

  open(): void {
    this._visible.next(true);
  }

  close(): void {
    this._visible.next(false);
  }

  toggle(): void {
    let visible = !this._visible.getValue();
    this._visible.next(visible);
  }

  onBlur(): void {
    setTimeout(() => {
      this.close();
    }, 300);
  }

}

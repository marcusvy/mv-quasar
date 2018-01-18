import { Injectable } from '@angular/core';

import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import { Observable } from 'rxjs/Observable';


@Injectable()
export class LoadbarService {

  private _status:BehaviorSubject<boolean> = new BehaviorSubject(false);

  get statusChanges() {
    return this._status.asObservable();
  }

  constructor() { }

  setStatus(value:boolean) {
    this._status.next(value);
  }
}

import {Injectable} from '@angular/core';
import {BehaviorSubject} from 'rxjs/BehaviorSubject';
import {Observable} from 'rxjs/Observable';

@Injectable()
export class QuasarOnlineStatusService {

  private _online: BehaviorSubject<boolean>;

  constructor() {
    this._online = new BehaviorSubject<boolean>(true);
  }

  get onlineChanges(): Observable<boolean> {
    return this._online.asObservable();
  }

  setOnlineStatus(value: boolean) {
    this._online.next(value);
  }
}

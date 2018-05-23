import {Injectable} from '@angular/core';
import {Observable, BehaviorSubject} from 'rxjs/Rx';

/**
 * Estabelece parâmetros para saber se o aplicativo cliente está online ou não.
 * Aqui fica a lógica que será utilizada para os storages e serviços http
 */
@Injectable()
export class ConnectionService {

  private _online: BehaviorSubject<boolean>;

  constructor() {
    this._online = new BehaviorSubject<boolean>(navigator.onLine);
  }

  get online(): Observable<boolean> {
    return this._online.asObservable();
  }

  setOnline() {
    this._online.next(true);
  }

  setOffline() {
    this._online.next(false);
  }
}

import {Injectable} from '@angular/core';
import {BehaviorSubject} from 'rxjs/BehaviorSubject';
import {Observable} from 'rxjs/Observable';
import {HttpEvent, HttpInterceptor, HttpHandler, HttpRequest, HttpErrorResponse} from '@angular/common/http';
import {ServerStatus} from '../lib/ServerStatus';

@Injectable()
export class QuasarServerStatusService implements HttpInterceptor {

  private _status: BehaviorSubject<ServerStatus>;

  constructor() {
    this._status = new BehaviorSubject<ServerStatus>(this.factory());
  }

  get statusChanges(): Observable<ServerStatus> {
    return this._status.asObservable();
  }

  intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    // @todo check error status
    return next.handle(req).do(event => {
      if (event instanceof HttpErrorResponse) {
        const serverStatus = new ServerStatus();
        serverStatus.error = event.error;
        serverStatus.ok = false;
        serverStatus.message = event.error.message;
        this._status.next(serverStatus);
      }
    });
  }

  factory() {
    const serverStatus = new ServerStatus();
    serverStatus.ok = true;
    serverStatus.message = '';
    serverStatus.error = null;
    return serverStatus;
  }

  reset() {
    this._status.next(this.factory());
  }
}

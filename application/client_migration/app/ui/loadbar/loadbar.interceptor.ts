import { Injectable } from '@angular/core';
import {
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpInterceptor,
  HttpResponse,
} from '@angular/common/http';
import { LoadbarService } from './loadbar.service';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class LoadbarInterceptor implements HttpInterceptor {

  constructor(private _loadbarService: LoadbarService) { }

  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    this._loadbarService.setStatus(true);
    return next.handle(request)
      .do(event => {
        if (event instanceof HttpResponse) {
          this._loadbarService.setStatus(false);
        }
      });
  }
}

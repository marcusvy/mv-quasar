import { Injectable } from "@angular/core";
import { MatSnackBar } from "@angular/material";
import { BehaviorSubject, Observable } from "rxjs";
import { ServerStatus, ApiResponse } from "../../lib";
import {
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpErrorResponse
} from "@angular/common/http";
import { tap } from "rxjs/operators";

@Injectable({
  providedIn: "root"
})
export class QuasarServerStatusService {
  private _status: BehaviorSubject<ServerStatus>;

  constructor(private _snackBar: MatSnackBar) {
    this._status = new BehaviorSubject<ServerStatus>(new ServerStatus());
  }

  get statusChanges(): Observable<ServerStatus> {
    return this._status.asObservable();
  }

  intercept(
    request: HttpRequest<ApiResponse>,
    next: HttpHandler
  ): Observable<HttpEvent<any>> {
    return next.handle(request).pipe(
      tap(event => {
        if (event instanceof HttpErrorResponse) {
          const status = new ServerStatus();
          status.error = event.error;
          status.message = event.message;
          this._status.next(status);
          this._snackBar.open(event.message, "ServerStatus", {
            duration: 1000
          });
        }
      })
    );
  }
}

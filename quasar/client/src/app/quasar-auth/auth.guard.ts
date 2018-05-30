import { Injectable } from "@angular/core";
import {
  ActivatedRouteSnapshot,
  CanActivate,
  CanActivateChild,
  CanLoad,
  Route,
  Router,
  RouterStateSnapshot,
} from "@angular/router";
import { Observable, of as observableOf } from "rxjs";
import { AuthService } from "./auth.service";
import { tap } from "rxjs/operators";

@Injectable({
  providedIn: "root"
})
export class AuthGuard implements CanActivate, CanLoad, CanActivateChild {

  constructor(private _service: AuthService, private _router: Router) {}

  canLoad(route: Route): boolean | Observable<boolean> | Promise<boolean> {
    this._service.isAuthenticated().subscribe(value => console.log(value));
    return this._service.isAuthenticated();
  }

  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot
  ): Observable<boolean> | Promise<boolean> | boolean {
    return this._service.isAuthenticated().pipe(
      tap(isAuthenticated => {
        if (!isAuthenticated) {
          this._router.navigateByUrl("/quasar/auth");
        }
        return isAuthenticated;
      })
    );
  }

  canActivateChild(
    childRoute: ActivatedRouteSnapshot,
    state: RouterStateSnapshot
  ): boolean | Observable<boolean> | Promise<boolean> {
    return this.canActivate(childRoute,state);
  }
}

import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { Observable } from 'rxjs/Observable';
import { Router, Route, CanLoad } from '@angular/router';
import { AuthService } from '../service/auth.service';


@Injectable()
export class AuthGuard implements CanActivate, CanLoad {

  constructor(private _service: AuthService, private _router: Router){

  }
  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
      if(!this._service.isAuthenticated()) {
        // this._router.navigateByUrl('/area-candidato/auth');
        this._router.navigateByUrl('/quasar/auth');
      }
    return true;
    // return this._service.isAuthenticated();
  }

  canLoad(route: Route): boolean | Observable<boolean> | Promise<boolean> {
    return true;
  }

}

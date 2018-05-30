import { Component, OnInit, OnDestroy } from "@angular/core";
import { Router } from "@angular/router";
import { Observable, Subscription, of as observableOf } from "rxjs";
import { tap, delay } from "rxjs/operators";
import { AuthService } from "../../auth.service";

@Component({
  selector: "mv-logout",
  templateUrl: "./logout.component.html",
  styleUrls: ["./logout.component.scss"]
})
export class LogoutComponent implements OnInit, OnDestroy {

  private _logout$$: Subscription;

  constructor(private _service: AuthService, private _router: Router) {}

  ngOnInit() {
    this._service.logout();
    this._logout$$ = this._service
      .isAuthenticated()
      .pipe(
        delay(2000),
        tap(isAuthenticated => {
          if (!isAuthenticated) {
            this._router.navigateByUrl("/quasar/auth");
          }
        })
      )
      .subscribe();
  }

  ngOnDestroy() {
    if (this._logout$$ !== undefined) {
      this._logout$$.unsubscribe();
    }
  }
}

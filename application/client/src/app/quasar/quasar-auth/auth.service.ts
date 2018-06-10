import {
  Injectable,
  Inject,
  Optional,
  InjectionToken,
  Host
} from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable, BehaviorSubject, of as observableOf } from "rxjs";
import { tap } from "rxjs/operators";
import { QuasarApiDatasourceService } from "../quasar-shared/quasar-api-datasource.service";
import { AuthFormSigninValue } from "../lib";

@Injectable({
  providedIn: "root"
})
export class AuthService {
  private _isAuthenticated: BehaviorSubject<boolean>;
  private _token = btoa("QuasarTokenId");

  constructor(private _http: HttpClient, private _api: QuasarApiDatasourceService) {
    this._isAuthenticated = new BehaviorSubject(this.checkToken());
  }

  checkToken(): boolean {
    let token = this.decryptToken();
    return token !== null && this.checkTokenIntegrity(token);
  }

  checkTokenIntegrity(token: Object) {
    return [
      "active",
      "createdat",
      "email",
      "id",
      "perfil",
      "role",
      "status",
      "updatedat"
    ]
      .map(item => token.hasOwnProperty(item))
      .every(verification => verification);
  }

  isAuthenticated(): Observable<boolean> {
    return this._isAuthenticated
      .asObservable()
      .pipe(tap(isAuthenticated => this.checkToken()));
  }

  logout() {
    // localStorage.removeItem(this._token);
    localStorage.clear();
    this._isAuthenticated.next(false);
    return this.isAuthenticated();
  }

  decryptToken() {
    const token = localStorage.getItem(this._token);
    if (token) {
      return JSON.parse(atob(token));
    }
    return {};
  }

  private protectAuthRequestBody(identity: string, credential: string) {
    return { token: btoa(JSON.stringify([identity, credential])) };
  }

  authenticate(identity: string, credential: string): Observable<Object> {
    return this._http
      .post(
        this._api.url("auth", "auth"),
        this.protectAuthRequestBody(identity, credential)
      )
      .pipe(
        tap(response => {
          if (response["success"] && response["token"]) {
            localStorage.setItem(
              this._token,
              btoa(JSON.stringify(response["token"]))
            );
            this._isAuthenticated.next(true);
          }
          return response;
        })
      );
  }

  signin(data: AuthFormSigninValue) {
    return this._http.post(this._api.url("auth", "register"), data);
  }

  activate(identity, key) {
    return this._http.get(this._api.urlWith("auth", "activate:identity:key")(identity, key));
  }
}

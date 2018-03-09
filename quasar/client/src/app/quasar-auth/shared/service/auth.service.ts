import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { QuasarConfigService } from '../../../quasar/shared/service/quasar-config.service';

/**
 * @todo intercept all errors
 */

@Injectable()
export class AuthService {

  private _token = 'profile';

  constructor(private _http: HttpClient, private _config: QuasarConfigService) { }

  isAuthenticated() {
    return localStorage.getItem(this._token) !== null;
  }

  logout() {
    localStorage.clear();
    return !this.isAuthenticated();
  }

  storeToken(obj) {
    localStorage.setItem(this._token, obj);
  }

  decryptToken() {
    const token = localStorage.getItem(this._token);
    return JSON.parse(atob(token));
  }

  private protectAuthRequestBody(identity: string, credential: string) {
    return { token: btoa(JSON.stringify([identity, credential])) };
  }

  authenticate(identity: string, credential: string): Observable<Object> {
    return this._http.post(
      this._config.api.auth.authenticate,
      this.protectAuthRequestBody(identity, credential)
    );
  }

  signin(data) {
    return this._http.post(this._config.api.auth.signin, data);
  }

  activate(identity, key) {
    return this._http.get(this._config.api.auth.activate(identity, key));
  }


}

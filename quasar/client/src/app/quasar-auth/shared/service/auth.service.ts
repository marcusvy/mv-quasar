import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { QuasarConfigService } from './../../../quasar/shared/service/quasar-config.service';

@Injectable()
export class AuthService {

  private _token: string = 'profile';

  constructor(private _http: HttpClient, private _config: QuasarConfigService) { }

  isAuthenticated() {
    return localStorage.getItem(this._token) !== null;
  }

  logout() {
    localStorage.clear();
    return !this.isAuthenticated();
  }

  storeToken(obj) {
    let dataStorage = obj;
    localStorage.setItem(this._token, dataStorage);
  }

  decryptToken() {
    let token = localStorage.getItem(this._token);
    let decrypt = JSON.parse(atob(token));
    return decrypt;
  }

  private protectAuthRequestBody(credential: string, password: string) {
    return { token: btoa(JSON.stringify([credential, password])) };
  }

  authenticate(credential: string, password: string): Observable<Object> {
    return this._http.post(
      this._config.api.auth.authenticate,
      this.protectAuthRequestBody(credential, password)
    );
  }

  signin(data) {
    return this._http.post(this._config.api.auth.signin, data);
  }

  activate(credential, key) {
    return this._http.get(this._config.api.auth.activate(credential, key))
  }


}

import { Injectable, Inject, Optional } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import {
  ApiDataSource,
  RouteApiDataSource,
  GeneratorApiDataSource
} from "../lib";
import { QuasarApiDatasourceService } from "./quasar-api-datasource.service";

@Injectable({
  providedIn: "root"
})
export class QuasarApiService {
  protected _options?: any = {};
  protected token: string = "";

  constructor(
    private _http: HttpClient,
    private _api: QuasarApiDatasourceService
  ) {}

  setToken(token){
    this.token = token;
    return this;
  }

  list(page = 1) {
    return this._http.get(
      this._api.urlWith(this.token, `${this.token}:page`)(page),
      this._options
    );
  }

  fetch() {
    return this._http.get(
      this._api.url(this.token, `${this.token}`),
      this._options
    );
  }

  create(data) {
    return this._http.post(
      this._api.url(this.token, `${this.token}`),
      data,
      this._options
    );
  }

  update(id, data) {
    return this._http.put(
      this._api.urlWith(this.token, `${this.token}:id`)(id),
      data,
      this._options
    );
  }

  delete(id) {
    return this._http.delete(
      this._api.urlWith(this.token, `${this.token}:id`)(id),
      this._options
    );
  }
}

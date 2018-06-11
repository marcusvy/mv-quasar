import { Injectable } from '@angular/core';
import { QuasarApiService } from '../quasar-api.service';
import { QuasarApiDatasourceService } from '../quasar-api-datasource.service';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: "root"
})
export class QuasarUserRoleService extends QuasarApiService {
  protected token: string = "user";

  constructor(
    private http: HttpClient,
    private api: QuasarApiDatasourceService
  ) {
    super(http, api);
  }

  list(page = 1) {
    return this.http.get(
      this.api.urlWith(this.token, `role:page`)(page),
      this._options
    );
  }
}

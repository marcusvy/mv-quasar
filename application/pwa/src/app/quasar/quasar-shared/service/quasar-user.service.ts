import { Injectable } from '@angular/core';
import { QuasarApiService } from '../quasar-api.service';
import { HttpClient } from '@angular/common/http';
import { QuasarApiDatasourceService } from '../quasar-api-datasource.service';

@Injectable({
  providedIn: "root"
})
export class QuasarUserService extends QuasarApiService {
  protected token: string = "user";

  constructor(
    private http: HttpClient,
    private api: QuasarApiDatasourceService
  ) {
    super(http, api);
  }
}

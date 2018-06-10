import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { QuasarApiService } from "../quasar-api.service";
import { QuasarApiDatasourceService } from "../quasar-api-datasource.service";

@Injectable({
  providedIn: "root"
})
export class QuasarLogService extends QuasarApiService {

  protected token: string = "log";

  constructor(
    private http: HttpClient,
    private api: QuasarApiDatasourceService
  ) {
    super(http, api);
  }
}

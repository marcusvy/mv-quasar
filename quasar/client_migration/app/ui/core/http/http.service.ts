import { Injectable } from '@angular/core';
import { HttpClient, HttpParams } from "@angular/common/http";

import { ConfigService } from '../config.service';
import { ConnectionService } from "../connection.service";

import { Observable } from "rxjs/Observable";

@Injectable()
export class HttpService {

  private readonly url: string = ''; //deve ser ajustada
  protected token: string = 'http::'; //deve ser ajustada

  constructor(
    protected config: ConfigService,
    protected connection: ConnectionService,
    protected httpClient: HttpClient,
  ) { }

  get api() {
    return `${this.config.API}${this.url}`;
  }

  public create(entity: any): Observable<any> {
    return this.httpClient.post<any>(this.api, entity)
      .catch(this.errorHandler);
  }

  public update(entity: any): Observable<any> {
    return this.httpClient.put<any>(`${this.api}/${entity.id}`, entity);
  }

  public delete(entity: any): Observable<any> {
    return this.httpClient.delete<any>(`${this.api}/${entity.id}`);
  }

  public get(id: string): Observable<any> {
    return this.httpClient.get<any>(`${this.api}/${id}`);
  }

  public list(): Observable<Array<any>> {
    return this.httpClient.get<Array<any>>(this.api);
  }

  public search(params: any): Observable<any> {
    let httpParams = new HttpParams();
    for (let [prop, value] of params) {
      httpParams.set(`${prop}`, value);
    }
    return this.httpClient.get<any>(this.api, {
      params: httpParams
    }).catch(this.errorHandler);
  }
  public errorHandler(error: any) {
    return Observable.throw(error.json().error || 'Server error');
  }

}













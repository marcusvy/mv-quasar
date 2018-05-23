import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable()
export class CandidatoService {

  private api = '/api/candidato'

  constructor(private _http: HttpClient) { }

  fetch(id) {
    if (id !== undefined) {
      return this._http.get(`${this.api}/${id}`);
    }
  }

  updatePerfil(data) {
    if (data !== undefined) {
      return this._http.post(`${this.api}-dados`, data);
    }
  }

  update(id,data){
    console.log(data);
    if (data !== undefined) {
      return this._http.put(`${this.api}/${id}`, data);
    }
  }
}

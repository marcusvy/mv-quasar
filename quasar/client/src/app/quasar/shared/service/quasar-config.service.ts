import { Injectable } from '@angular/core';

@Injectable()
export class QuasarConfigService {

  constructor() { }

  /**
   * module.action.method:
   */
  public get api() {
    return {
      auth: {
        authenticate: '/api/candidato-login',
        signin: '/api/user/register',
        activate: (key) => `'/api/candidato-ativar/'${key}`
      }
    };
  }

}

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
        authenticate: '/api/auth',
        signin: '/api/user/register',
        activate: (credential, key) => `/api/user/activate/for/${credential}/by/${key}`
      },
      user: {
        list: (page = 1) => { `/api/user/list/${page}` },
        fetch: (id) => `/api/user/${id}`,
        children: {
          perfil: {
            list: (page = 1) => { `/api/user-perfil/list/${page}` },
            fetch: (id) => `/api/user-perfil/{id}`,
          },
          role: {
            list: (page = 1) => { `/api/user-role/list/${page}` },
            fetch: (id) => `/api/user-role/${id}`,
          }
        }
      },
      midia: {
        children: {
          audio: {
            default: '/api/midia/audio',
            list: (page = 1) => { `/api/midia/audio/list/${page}` },
            fetch: (id) => `/api/midia/audio/{id}`,
          },
          image: {
            default: '/api/midia/image',
            list: (page = 1) => { `/api/midia/image/list/${page}` },
            fetch: (id) => `/api/midia/image/{id}`,
          },
          video: {
            default: '/api/midia/video',
            list: (page = 1) => { `/api/midia/video/list/${page}` },
            fetch: (id) => `/api/midia/video/{id}`,
          },
        }
      }
    };
  }

}

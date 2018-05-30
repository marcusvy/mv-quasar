import { Injectable, Inject, Optional } from '@angular/core';
import { ApiDataSource, RouteApiDataSource, GeneratorApiDataSource } from '../lib';

@Injectable({
  providedIn: 'root'
})
export class QuasarApiService {

  private _api;

  constructor(
    @Optional()
    @Inject('ApiDataSource')
    private _dataSources: ApiDataSource[]
  ) { }

  /**
   * Get the route url for route by 'token' and the 'name'
   * @example _api.route('auth', 'signin')
   * @param token
   * @param name
   * @returns string
   */
  url(token, name) {
    let selected = this._dataSources
      .map((ds: ApiDataSource, index) => {
        let routes = ds.routes.filter(
          (route: RouteApiDataSource) => route.name == name
        );
        if (routes.length > 0) {
          return routes.map((route: RouteApiDataSource) => route.url).shift()
        }
      });
    selected.map((result, index) => {
      return (result === undefined) ? selected.splice(index, 1) : result
    });
    return selected.toString();
  }

  /**
   * Get the url generator for route by 'token' and the 'name'. Returns a
   * function to add properties this Url
   * @example this._api.routeWith('auth', 'activate')('identity', 'key');
   * @param token The provided token
   * @param name
   * @returns function
   */
  urlWith(token, name): any {
    let selected = this._dataSources
      .map((ds: ApiDataSource, index) => {
        let generators = ds.generators.filter(
          (generator: GeneratorApiDataSource) => generator.name == name
        );
        if (generators.length > 0) {
          return generators.map((generator: GeneratorApiDataSource) => generator.callback).shift()
        }
      });
    selected.map((result, index) => {
      return (result === undefined) ? selected.splice(index, 1) : result
    });
    return selected[0];
  }

}

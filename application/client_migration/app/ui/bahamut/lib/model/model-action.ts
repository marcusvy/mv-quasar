import { HttpClient, HttpParams, HttpHeaders } from '@angular/common/http';
import { Config } from './../config';
import { ConfigAdapter } from './../config-adapter';

export class ModelAction {

  private _method: 'fetch' | 'list' | 'create' | 'update' | 'delete' | '' = '';
  private _url: string;
  private _options?: any = {};
  private _data?: any;
  private _id?: number;

  constructor(private _config: ConfigAdapter, private _http: HttpClient) { }

  /**
   * Execute the method (action)
   * @param value a method to execute
   */
  method(value: 'fetch' | 'list' | 'create' | 'update' | 'delete' | '' = '') {
    this._method = value;
    return this;
  }

  http() {
    return this._http;
  }

  /**
   * Setup the url
   * @param value The url to requrest
   */
  url(value: string) {
    this._url = value;
    return this;
  }


  /**
   * Setup the HttpClient request
   * @param value The options for HttpClient
   */
  options(value: any) {
    this._options = value;
    return this;
  }

  /**
   * Setup the data that will be send to server
   * @param value The body of the request (Ex.: Form's data)
   */
  data(value: any) {
    this._data = value;
    return this;
  }

  /**
   * Entity identity
   * @param value The id of entity to use in fetch, update or delete methods
   */
  id(value: number) {
    this._id = value;
    return this;
  }

  /**
   * Execute a http request via HttpClient.
   */
  do() {
    if (this._config.headers !== undefined) {
      this._options['headers'] = this._config.headers;
    }

    switch (this._method) {
      case 'list':
        return this._http.get(this.getUrlList(), this._options);
      case 'fetch':
        return this._http.get(this.getUrlFetch(), this._options);
      case 'create':
        return this._http.post(this.getUrlCreate(), this._data, this._options);
      case 'update':
        return this._http.put(this.getUrlUpdate(), this._data, this._options);
      case 'delete':
        return this._http.delete(this.getUrlDelete(), this._options);
      default:
        return this._http.get(this.getUrl(), this._options);
    }
  }

  /**
   * Get
   */
  getUrlList() { return this._config.url.list; }
  getUrlFetch() { return `${this._config.url.fetch}/${this._id}`; }
  getUrlCreate() { return this._config.url.create; }
  getUrlUpdate() { return `${this._config.url.update}/${this._id}`; }
  getUrlDelete() { return `${this._config.url.delete}/${this._id}`; }
  getUrl() { return this._config.base(this._url); }
}

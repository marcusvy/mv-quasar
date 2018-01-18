import { HttpHeaders } from '@angular/common/http';
import { Config } from './config';

interface ConfigAdatperUrl {
  fetch: string;
  list: string;
  create: string;
  update: string;
  delete: string;
}

export class ConfigAdapter {

  /** Base URL of API. Prefix for other urls */
  api?: string;

  /** Token Auth */
  headers?: HttpHeaders;

  /** Fetch one entity */
  fetch?: string = '';

  /** Fetch list of entities */
  list?: string = '';

  /** URL for create action */
  create?: string = '';

  /** URL for update action */
  update?: string = '';

  /** URL for delete action */
  delete?: string = '';

  constructor(config: Config) {
    this.api = config.api;
    this.fetch = config.fetch;
    this.list = config.list;
    this.create = config.create;
    this.update = config.update;
    this.delete = config.delete;
    this.headers = config.headers;
  }

  base(url){
    return `${this.api}${url}`;
  }

  /** Prefixed urls */

  get url ():ConfigAdatperUrl {
    return {
      fetch: this.base(this.fetch),
      list: this.base(this.list),
      create: this.base(this.create),
      update: this.base(this.update),
      delete: this.base(this.delete),
    };
  }

}

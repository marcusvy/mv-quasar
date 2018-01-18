import { HttpHeaders } from '@angular/common/http';

export interface Config {

  /** Base URL of API. Prefix for other urls */
  api?: string;

  /** Token Auth */
  headers?: HttpHeaders,

  /** Fetch one entity */
  fetch?: string;

  /** Fetch list of entities */
  list?: string;

  /** URL for create action */
  create?: string;

  /** URL for update action */
  update?: string;

  /** URL for delete action */
  delete?: string;

}

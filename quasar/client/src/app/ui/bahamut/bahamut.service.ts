import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import { Observable } from 'rxjs/Observable';
import { Config } from './lib/config';
import { ConfigAdapter } from './lib/config-adapter';
import { ModelAction } from './lib/model/model-action';
import { ModelMode } from './lib/model/model-mode';
import { ModelPagination } from './lib/model/model-pagination';

@Injectable()
export class BahamutService {

  private _mode: BehaviorSubject<ModelMode>;
  private _pagination: BehaviorSubject<ModelPagination>;
  private _collection: BehaviorSubject<any[]>;
  private _storage: { collection: any[], selected: any | null };
  private _config: ConfigAdapter;
  private _action: ModelAction;

  constructor(private _http: HttpClient) {
    this._mode = new BehaviorSubject(new ModelMode())
    this._pagination = new BehaviorSubject(new ModelPagination());
    this._collection = new BehaviorSubject<any[]>([]);
    this._storage = { collection: [], selected: null }; //temporary data for process collection
  }

  /**
   * Mode
   */

  get modeChanges(): Observable<ModelMode> {
    return this._mode.asObservable();
  }

  getMode() {
    return this._mode.getValue();
  }

  setMode(obj: ModelMode) {
    return this._mode.next(obj);
  }

  /**
   * Pagination
   */

  get paginationChanges(): Observable<ModelPagination> {
    return this._pagination.asObservable();
  }

  setPagination(obj: ModelPagination) {
    this._pagination.next(obj)
    this.setCollection(obj.collection);
    return this.paginationChanges;
  }

  modelPagination(): ModelPagination {
    return new ModelPagination();
  }

  /**
   * Collection
   */

  get collectionChanges(): Observable<any[]> {
    return this._collection.asObservable();
  }

  isCollectionEmpty() {
    return (this._collection.getValue().length === 0);
  }

  setCollection(collection: any[]) {
    this._storage.collection = collection;
    this._collection.next(this._storage.collection);
    return this._collection;
  }

  // collectionAdd(model) {
  //   this._storage.collection.push(model);
  //   return this._collection.next(this._storage.collection);
  // }

  // collectionUpdate(model, newModel) {
  //   this._storage.collection = this._storage.collection.find(item =>  item !== model).push(newModel);
  //   this._collection.next(this._storage.collection);
  // }

  // collectionRemove(model) {
  //   this._storage.collection = this._collection.getValue()
  //       .filter((item) => Object.getOwnPropertyNames(item)
  //       .filter(key => item[key] !== model[key])
  //       .length > 0);
  //   this._storage.collection = this._collection.getValue().find(item =>  item !== model);
  //   return this._collection.next(this._storage.collection);
  // }

  // collectionRemoveList(model:any[]){
  //   this._storage.collection = this._storage.collection.find(item => !model.includes(item));
  //   this._collection.next(this._storage.collection);
  // }

  getCollectionTotal(): number {
    return this._storage.collection.length;
  }

  getSelected(): any {
    return this._storage.selected;
  }

  setSelected(model): any {
    return this._storage.selected = model;
  }

  /**
   * Configure service to http
   */
  config(config: Config) {
    this._config = new ConfigAdapter(config);
    return this;
  }

  /**
   * @return ConfigAdapter
   */
  getConfig(){
    return this._config;
  }

  /**
   * Factory a action configuration to inject into 'do' method
   */
  action() {
    return new ModelAction(this._config, this._http);
  }

  /**
   * Do a http request
   */
  do(action: ModelAction) {
    return action.do();
  }

  /**
   * Translate the model to
   * @param model
   */
  normalize(model, normalize = null) {
    if (normalize !== null) {
      model = normalize(model);
    }
    this.setPagination(model);
    return this.paginationChanges;
  }

}

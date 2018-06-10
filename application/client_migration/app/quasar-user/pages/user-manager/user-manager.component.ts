import { Component, OnInit } from '@angular/core';
import { OnDestroy } from '@angular/core/src/metadata/lifecycle_hooks';
import { Subscription } from 'rxjs/Subscription';

import { BahamutService } from '../../../ui/bahamut/bahamut.service';

@Component({
  selector: 'app-user-manager',
  templateUrl: './user-manager.component.html',
  styleUrls: ['./user-manager.component.scss']
})
export class UserManagerComponent implements OnInit, OnDestroy {

  private _fetchSubscription: Subscription;

  constructor(private _service: BahamutService) { }

  ngOnInit() {
    this._service.config({
      api: 'http://localhost:4200/api/',
      fetch: 'user',
      list: 'user',
      create: 'user',
      update: 'user'
    });
    this.fetch();
  }

  ngOnDestroy() {
    if(this._fetchSubscription !== undefined){
      this._fetchSubscription.unsubscribe();
    }
  }

  normalize(data) {
    let model = this._service.modelPagination();
    model.collection = data.collection;
    return model;
  }

  fetch() {
    let action = this._service
      .action()
      .method('list');

    this._fetchSubscription = this._service
      .do(action)
      .switchMap((model: any) => this._service.normalize(model, (model) => this.normalize(model)))
      .subscribe((data) => {
        console.log(data);
      })
  }

  save(formData) {
    let action = this._service.action().method('create').data(formData);
    this._service.do(action).subscribe((data)=>{
      console.log(data);
    });
  }
}

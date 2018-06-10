import { Component, OnInit, OnDestroy, ViewChild } from '@angular/core';
import { Subscription } from 'rxjs/Subscription';
import { BahamutComponent, BahamutService } from '../../../ui/bahamut';
import { UserRoleResponse } from './../../shared/lib/UserRoleResponse';

@Component({
  selector: 'app-user-role-manager',
  templateUrl: './user-role-manager.component.html',
  styleUrls: ['./user-role-manager.component.scss']
})
export class UserRoleManagerComponent implements OnInit, OnDestroy {


  private _fetchSubscription: Subscription;
  @ViewChild(BahamutComponent) private _managerComponent: BahamutComponent;

  constructor(private _service: BahamutService) { }

  ngOnInit() {
    this._service.config({
      api: 'http://localhost:4200/api/',
      fetch: 'user-role',
      list: 'user-role/list',
      create: 'user-role',
      update: 'user-role',
      delete: 'user-role'
    });
    this.fetch();
  }

  ngOnDestroy() {
    if (this._fetchSubscription !== undefined) {
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

    this._fetchSubscription = this._service.do(action)
      .switchMap((model: any) => this._service.setPagination(model))
      .subscribe((data) => { });
  }

  onDelete(model) {
    let action = this._service
      .action()
      .method('delete')
      .id(model.id)
      .do()
      .retry(3)
      .switchMap((model: any) => {
        if (model.success) {

        }
        return this._service.paginationChanges;
      })
      .subscribe(data => console.log(''));
    ;
  }

  save(formData) {
    let action = this._service.action()
      .method('create')
      .data(formData)
      .do()
      // .switchMap((model: any) => {
      //   console.log(model);
      //   this._service.normalize(model, (model) => this.normalize(model))
      // })
      .subscribe((data: any) => {
        console.log('');
        // let value: UserRoleResponse = data;
        // if (value.success) {
        // this._managerComponent.selectTab('list');
        // }
      });

  }

}

## Bahamut Service


Default Service Usage

```typescript
export class ManagerComponent {

  constructor(private _service: BahamutService) { }
  
  save() {
    // Configure the Service
    this._service.config({
      api: 'http://localhost:4200/api/',
      fetch: 'user-role',
      list: 'user-role',
      create: 'user-role',
      update: 'user-role'
    });

    // Retrieve and Configure a Action
    let action = this._service.action()
      .method('fetch')
      .data(formData);
    // Execute the action with method do or http
    // 1. Do method way (easy)
    action.do(action).subscribe(data) => {
      if (data.success) {}
    });
    // 2. Http method way (advanced)
    action.http().get<UserRoleResponse>(action.getUrlCreate())
      .subscribe((data: UserRoleResponse) => {
        if (data.success) {}
      });
  }
  
}
```
Data Normalization

```typescript
export class ManagerComponent implements OnInit {
  constructor(private _service: BahamutService) { }
  
  ngOnInit() {
    this._service.config({
      api: 'http://localhost:4200/api/',
      fetch: 'module',
      list: 'module',
      create: 'module',
      update: 'module'
    });
    this.fetch();
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
      .switchMap((model: any) => this._service.normalize(model, (model) => this.normalize(model)))
      .subscribe((data) => {
        console.log(data);
      });
  }
}
```

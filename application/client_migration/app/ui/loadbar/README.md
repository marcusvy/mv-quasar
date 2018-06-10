# Loadbar

A global loading bar for intercept HTTP Requests

# Usage

```html
<mv-loadbar></mv-loadbar>
```

## Manual triggers

Inject **LoadbarService** and set the status with **setStatus** method. 
Set the enabled status with the value ```true```

*my-component.ts*
```typescript
export class LoadbarComponent implements OnInit {

  constructor(private _service: LoadbarService) { }

  loading() {
    this._service.setStatus(true);
  }
  complete() {
    this._service.setStatus(false);
  }
}
```

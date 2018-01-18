import { Component } from '@angular/core';

@Component({
  selector: 'mv-row',
  template: '<ng-content></ng-content>',
  styleUrls: ['./row.component.scss']
})
export class RowComponent{

  constructor() { }

}

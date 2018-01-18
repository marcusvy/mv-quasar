import { Component } from '@angular/core';

@Component({
  selector: 'mv-col',
  template: '<ng-content></ng-content>',
  styleUrls: ['./col.component.scss']
})
export class ColComponent {

  constructor() { }

}

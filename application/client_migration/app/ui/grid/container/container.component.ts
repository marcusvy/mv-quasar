import { Component } from '@angular/core';

@Component({
  selector: 'mv-container',
  template: '<ng-content></ng-content>',
  styleUrls: ['./container.component.scss']
})
export class ContainerComponent{

  constructor() { }

}

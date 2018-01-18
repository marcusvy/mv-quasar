import { Component } from '@angular/core';

@Component({
  selector: 'mv-menu',
  template: '<ng-content></ng-content>',
  styleUrls: [
    './menu.component.scss',
    './menu.theme.scss',
  ]
})
export class MenuComponent {

  constructor() {
  }
}

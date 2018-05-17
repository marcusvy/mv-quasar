import { Component } from '@angular/core';

@Component({
  selector: 'mv-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
  host: {
    'class': 'container',
    'fxLayout': 'column',
    'fxLayoutAlign': 'center stretch',
  }
})
export class AppComponent {
  title = 'mv';

  constructor() {

  }
}

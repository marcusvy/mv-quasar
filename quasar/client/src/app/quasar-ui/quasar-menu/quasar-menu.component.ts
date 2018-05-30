import { Component } from '@angular/core';
import { QuasarMenu, } from '../../lib';
import { QUASAR_MENU_DATASOURCE } from './quasar-menu.datasource';
import { Observable, of as observableOf } from 'rxjs';

@Component({
  selector: 'mv-quasar-menu',
  templateUrl: './quasar-menu.component.html',
  styleUrls: ['./quasar-menu.component.scss']
})
export class QuasarMenuComponent {

  menu$: Observable<QuasarMenu[]> = observableOf(QUASAR_MENU_DATASOURCE);

}

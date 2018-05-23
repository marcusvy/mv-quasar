import { Component, OnInit } from '@angular/core';
import { QuasarMenu, QuasarMenuItem } from '../../lib';

@Component({
  selector: 'mv-quasar-menu',
  templateUrl: './quasar-menu.component.html',
  styleUrls: ['./quasar-menu.component.scss']
})
export class QuasarMenuComponent implements OnInit {

  menu:QuasarMenu = [

  ]
  constructor() { }

  ngOnInit() {
  }

}

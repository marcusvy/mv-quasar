import { Component, OnInit } from '@angular/core';
import { SidebarOptions } from './../../ui/index';

@Component({
  selector: 'im-quasar-shell',
  templateUrl: './quasar-shell.component.html',
  styleUrls: ['./quasar-shell.component.scss']
})
export class QuasarShellComponent implements OnInit {

  leftSidebarOptions: SidebarOptions = new SidebarOptions();
  rightSidebarOptions: SidebarOptions = new SidebarOptions();

  constructor() {
    this.leftSidebarOptions
      .setTitle('Menu')
      .setIcon('bars')
      // .setBackdrop(true);
      .setOpened(true)
      .setFlex(true);

    this.rightSidebarOptions
      .setTitle('Perfil')
      .setIcon('user-circle-o')
      .setRight(true)
      // .setOpened(true)
      // .setFlex(true);
      .setBackdrop(true);
  }


  ngOnInit() {
  }

}

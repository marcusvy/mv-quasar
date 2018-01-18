import { Component, OnInit } from '@angular/core';
import { SidebarOptions } from './../ui/layout/sidebar/sidebar-options';

@Component({
  selector: 'im-area-candidato',
  templateUrl: './area-candidato.component.html',
  styleUrls: ['./area-candidato.component.scss']
})
export class AreaCandidatoComponent implements OnInit {

  leftSidebarOptions: SidebarOptions = new SidebarOptions();
  rightSidebarOptions: SidebarOptions = new SidebarOptions();

  constructor() {
    this.leftSidebarOptions
      .setTitle('Multtask Concursos')
      .setIcon('bars')
      // .setBackdrop(true);
      .setOpened(true)
      .setFlex(true);

    this.rightSidebarOptions.setEnabled(false);

    // this.rightSidebarOptions
    //   .setTitle('Perfil')
    //   .setIcon('user-circle-o')
    //   .setRight(true)
    //   // .setOpened(true)
    //   // .setFlex(true);
    //   .setBackdrop(true);
  }

  ngOnInit() {
  }

}

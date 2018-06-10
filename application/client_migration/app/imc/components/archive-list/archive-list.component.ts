import { Component, OnInit } from '@angular/core';
import { Archive } from './archive';

@Component({
  selector: 'im-archive-list',
  templateUrl: './archive-list.component.html',
  styleUrls: ['./archive-list.component.scss']
})
export class ArchiveListComponent implements OnInit {

  archives: Archive[];

  constructor() { }

  ngOnInit() {
    this.generateList();
  }

  generateList() {
    this.archives = [
      { publicadoEm: '2017-12-28', nome: 'Manual do Candidato', local: 'local/0012017/archive/manual_do_candidato.pdf' },
      { publicadoEm: '2017-12-28', nome: 'Edital de Abertura', local: 'local/0012017/archive/edital_de_abertura.pdf' },
    ];
  }

}

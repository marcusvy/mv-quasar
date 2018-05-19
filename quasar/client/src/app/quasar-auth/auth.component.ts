import { Component, OnInit, ViewChild } from '@angular/core';
import { MatExpansionPanel } from '@angular/material';

@Component({
  selector: 'mv-auth',
  templateUrl: './auth.component.html',
  styleUrls: ['./auth.component.scss']
})
export class AuthComponent implements OnInit {

  @ViewChild('expansionPanelEntrar')
  epEntrar: MatExpansionPanel;

  constructor() { }

  ngOnInit() {
    this.epEntrar.open();
  }

}

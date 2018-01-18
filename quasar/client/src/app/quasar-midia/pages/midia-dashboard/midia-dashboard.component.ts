import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-midia-dashboard',
  templateUrl: './midia-dashboard.component.html',
  styleUrls: ['./midia-dashboard.component.scss']
})
export class MidiaDashboardComponent implements OnInit {

  enabledFastUpload = false;
  enabledStats = false;

  constructor() { }

  ngOnInit() { }
}

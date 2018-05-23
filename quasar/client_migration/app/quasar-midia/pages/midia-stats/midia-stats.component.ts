import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-midia-stats',
  templateUrl: './midia-stats.component.html',
  styleUrls: ['./midia-stats.component.scss']
})
export class MidiaStatsComponent implements OnInit {

  @Input() canLoad;

  constructor() { }

  ngOnInit() {
  }

}

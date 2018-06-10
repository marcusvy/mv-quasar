import { Component } from '@angular/core';

@Component({
  selector: 'mv-quasar-dashboard',
  templateUrl: './quasar-dashboard.component.html',
  styleUrls: ['./quasar-dashboard.component.scss']
})
export class QuasarDashboardComponent {
  cards = [
    { title: 'Card 1', cols: 2, rows: 1 },
    { title: 'Card 2', cols: 1, rows: 1 },
    { title: 'Card 3', cols: 1, rows: 2 },
    { title: 'Card 4', cols: 1, rows: 2 },
    { title: 'Card 5', cols: 1, rows: 1 }
  ];
}

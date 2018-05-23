import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'mv-quasar',
  templateUrl: './quasar.component.html',
  styleUrls: ['./quasar.component.scss'],
  host: {
    'fxLayout':'column',
  }
})
export class QuasarComponent implements OnInit {

  ngOnInit() { }

}

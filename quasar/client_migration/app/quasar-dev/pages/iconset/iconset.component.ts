import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import {map} from 'rxjs/operators';

interface Icon {
  name: string;
  code: string;
}

interface IconResult {
  name: string;
  collection: Icon[];
}

@Component({
  selector: 'mv-quasar-cheatsheet-material-iconset',
  templateUrl: './iconset.component.html',
  styleUrls: ['./iconset.component.scss']
})
export class IconsetComponent implements OnInit {

  title: string;
  icons: Icon[];
  constructor(private _http: HttpClient) { }

  ngOnInit() {
    this._http
      .get<IconResult>('/assets/dev/material-iconset-3.0.1.json')
      .subscribe((resultIconset)=>{
        this.title = resultIconset.name;
        this.icons = resultIconset.collection;
      });
  }

}

import { Component, OnInit, TemplateRef, Input } from '@angular/core';

@Component({
  selector: 'mv-bahamut-form',
  templateUrl: './bahamut-form.component.html',
  styleUrls: ['./bahamut-form.component.scss']
})
export class BahamutFormComponent implements OnInit {

  @Input() template: TemplateRef<any>;
  model:any;

  constructor() { }

  ngOnInit() {
  }

}

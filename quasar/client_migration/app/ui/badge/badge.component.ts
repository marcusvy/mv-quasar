import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'mv-badge',
  templateUrl: './badge.component.html',
  styleUrls: [
    './badge.component.scss',
    './badge.theme.scss',
  ],
})
export class BadgeComponent implements OnInit {

  @Input() value: string = '';

  constructor() { }

  ngOnInit() {
  }

}

import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'mv-footer',
  templateUrl: './footer.component.html',
  styleUrls: [
    './footer.component.scss',
    './footer.theme.scss',
  ]
})
export class FooterComponent implements OnInit {

  @Input() logo: string = '';

  constructor() { }

  ngOnInit() {
  }

  hasLogo() {
    return this.logo.length > 0;
  }

}

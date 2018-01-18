import { DomSanitizer } from '@angular/platform-browser';
import { Component, OnInit, Input, SecurityContext } from '@angular/core';

@Component({
  selector: 'mv-footer-dev',
  templateUrl: './footer-dev.component.html',
  styleUrls: [
    './footer-dev.component.scss',
    './footer-dev.theme.scss',
  ]
})
export class FooterDevComponent implements OnInit {

  @Input() name = '© MVinicius';
  @Input('logo') private _logo = '';
  @Input('website') private _website: string = 'https://mviniciusconsultoria.com.br/';
  today: Date = new Date();

  constructor(private _sanitizer: DomSanitizer) { }

  ngOnInit() {
  }

  get logo() {
    return this._logo;
  }

  set logo(url) {
    this._logo = this._sanitizer.sanitize(SecurityContext.RESOURCE_URL, url);
  }

  get website() {
    return this._website;
  }

  set website(url) {
    this._website = this._sanitizer.sanitize(SecurityContext.RESOURCE_URL, url);
  }

  hasLogo() {
    return this._logo.length > 0;
  }

}

import { DomSanitizer, SafeResourceUrl } from '@angular/platform-browser';
import { Component, OnInit, Input, Output, EventEmitter, SecurityContext, HostBinding } from '@angular/core';


@Component({
  selector: 'mv-hero',
  templateUrl: './hero.component.html',
  styleUrls: [
    './hero.component.scss',
    './hero.theme.scss',
  ],
})
export class HeroComponent implements OnInit {

  @Input() img: string = '';
  @Input() filter: string = '';
  @Input() opacity: number = 1;

  constructor(private _sanitizer: DomSanitizer) { }

  ngOnInit() { }

  @HostBinding('style.background-image')
  get getBackgroundImage() {
    let url = this._sanitizer.sanitize(SecurityContext.URL, this.img);
    let style = (this.img.length > 0) ? `url('${url}')` : null;
    return this._sanitizer.bypassSecurityTrustStyle(style);
  }

  getFilterStyle() {
    return (this.hasFilter()) ? {
      'opacity': this.opacity,
      'background-color': this.filter
    }:{};
  }

  hasFilter() {
    return this.filter.length > 0;
  }
}

import { DomSanitizer } from '@angular/platform-browser';
import { Component, OnInit, Input, SecurityContext } from '@angular/core';

@Component({
  selector: 'mv-avatar',
  templateUrl: './avatar.component.html',
  styleUrls: [
    './avatar.component.scss',
    './avatar.theme.scss',
  ],
})
export class AvatarComponent implements OnInit {

  @Input('src') _src: string = '';

  constructor(private _sanitizer: DomSanitizer) { }

  get src(): string {
    return this._src;
  }

  set src(value: string) {
    this._src = this._sanitizer.sanitize(SecurityContext.RESOURCE_URL, value);
  }

  ngOnInit() {}

}

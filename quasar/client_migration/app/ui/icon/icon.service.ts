import { Injectable, SecurityContext } from '@angular/core';
import { SafeResourceUrl, DomSanitizer } from '@angular/platform-browser';
import { BehaviorSubject, Observable } from "rxjs/Rx";

@Injectable()
export class IconService {

  private _prefix: BehaviorSubject<string> = new BehaviorSubject<string>('fa');
  private link: string[] = [];

  constructor(private _sanitizer: DomSanitizer) {
  }

  getPrefix(): Observable<string> {
    return this._prefix.asObservable();
  }

  setPrefix(value) {
    this._prefix.next(value);
  }

  getLink() {
    return this.link;
  }

  addLink(safeUrl: SafeResourceUrl) {
    let url = this._sanitizer.sanitize(SecurityContext.RESOURCE_URL, safeUrl);
    this.link.push(url);
  }
}

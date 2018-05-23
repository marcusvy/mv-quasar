import { DOCUMENT } from '@angular/platform-browser';
import { ScrollerDirective } from './scroller.directive';
import { Component, OnInit, ContentChild, AfterContentInit, Inject, Input, ViewEncapsulation, ElementRef, HostBinding } from '@angular/core';

@Component({
  selector: 'mv-scroller',
  templateUrl: './scroller.component.html',
  styleUrls: ['./scroller.component.scss']
})
export class ScrollerComponent implements OnInit, AfterContentInit {

  @ContentChild(ScrollerDirective) scroller: ScrollerDirective;
  @Input('on') shrinkOn: any = 300;
  private _auto: boolean = false;

  constructor(
    @Inject(DOCUMENT) private document: any,
    private el: ElementRef
  ) { }

  ngOnInit() {
    if (this.shrinkOn === '*') {
      this.shrinkOn = this.scroller.calcHeight();
    }
  }

  ngAfterContentInit() {
    if (this.scroller !== undefined) {
      this.registerScoller();
    }
  }

  registerScoller() {
    if (typeof window !== 'undefined') {
      window.addEventListener('scroll', (e) => {
        let distanceY = window.pageYOffset || this.document.documentElement.scrollTop;

        if (distanceY > this.shrinkOn) {
          this.scroller.setOff();
        } else {
          this.scroller.setOn();
        }
      });
    }
  }
}

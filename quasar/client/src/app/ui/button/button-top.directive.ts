import { Directive, Host, HostListener, Input, OnInit } from '@angular/core';
import { ButtonComponent } from './button.component';

@Directive({
  selector: 'button[mv-btn][top]',
  host: {
    '(click)': 'scrollTop($event)'
  }
})
export class ButtonTopDirective implements OnInit {

  constructor( @Host() private _btn: ButtonComponent) {
    this._btn.animationState = 'out';
  }

  // animationState: string = 'out';

  /**
   * Go top button will appear when user scrolls Y to this position
   * @type {number}
   */
  @Input() scrollDistance: number = 200;


  /**
   * If true scrolling to top will be animated
   * @type {boolean}
   */
  @Input() animate: boolean = false;

  /**
   * Animated scrolling speed
   */
  @Input() speed: number = 80;

  /**
   * Acceleration coefficient, added to speed when using animated scroll
   * @type {number}
   */
  @Input() acceleration: number = 0;

  ngOnInit() {
    this.validateInputs();
  }

  private validateInputs = () => {
    var errorMessagePrefix = 'GoTopButton component input validation error: ';

    if (this.scrollDistance < 0) {
      throw Error(errorMessagePrefix + "'scrollDistance' parameter must be greater or equal to 0");
    }

    if (this.speed < 1) {
      throw Error(errorMessagePrefix + "'speed' parameter must be a positive number");
    }

    if (this.acceleration < 0) {
      throw Error(errorMessagePrefix + "'acceleration' parameter must be greater or equal to 0");
    }
  };

  /**
   * Listens to window scroll and animates the button
   */
  @HostListener('window:scroll', [])
  onWindowScroll = () => {
    if (this.isBrowser()) {
      this._btn.animationState = this.getCurrentScrollTop() > this.scrollDistance ? 'in' : 'out';
    }
  };

  /**
   * Scrolls window to top
   * @param event
   */
  scrollTop = (event: any) => {
    if (!this.isBrowser()) {
      return;
    }

    event.preventDefault();
    if (this.animate) {
      this.animateScrollTop();
    } else {
      window.scrollTo(0, 0);
    }
  };

  /**
   * Performs the animated scroll to top
   */
  animateScrollTop = () => {
    var initialSpeed = this.speed;
    var timerID = setInterval(() => {
      window.scrollBy(0, -initialSpeed);
      initialSpeed = initialSpeed + this.acceleration;
      if (this.getCurrentScrollTop() == 0)
        clearInterval(timerID);
    }, 15);
  };

  /**
   * Get current Y scroll position
   * @returns {any|((event:any)=>undefined)}
   */
  getCurrentScrollTop = () => {
    if (typeof window.scrollY != 'undefined') {
      return window.scrollY;
    }

    if (typeof window.pageYOffset != 'undefined') {
      return window.pageYOffset;
    }

    if (typeof document.body.scrollTop != 'undefined') {
      return document.body.scrollTop;
    }

    if (typeof document.documentElement.scrollTop != 'undefined') {
      return document.documentElement.scrollTop;
    }

    return 0;
  };


  /**
   * This check will prevent 'window' logic to be executed
   * while executing the server rendering
   * @returns {boolean}
   */
  isBrowser = (): boolean => {
    return typeof (window) !== 'undefined';
  };
}

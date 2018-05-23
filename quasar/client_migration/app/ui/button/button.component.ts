import { Component, OnInit, HostBinding } from '@angular/core';
import { ButtonTopAnimation } from './button.animation';

@Component({
  selector: 'button[mv-btn]',
  templateUrl: './button.component.html',
  styleUrls: [
    './button.component.scss',
    './button.theme.scss',
  ],
  animations: [ButtonTopAnimation],
  host: {
    '[@appearInOut]': 'animationState'
  }
})
export class ButtonComponent
  implements OnInit {

  animationState: string = '';

  constructor() { }

  ngOnInit() {
  }

  @HostBinding('@appearInOut')
  get isTop() {
    if (this.animationState !== '') {
      return this.animationState;
    }
    return null;
  }

}

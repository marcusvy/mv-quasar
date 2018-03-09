import {trigger, animate, transition, style} from '@angular/animations';

const interval = '300ms';

export const MV_ANIMATION_FADE_IN: any =
  trigger('fadeIn', [
    // route 'enter' transition
    transition(':enter', [

      // styles at start of transition
      style({opacity: 0, display: 'block'}),

      // animation and styles at end of transition
      animate(interval, style({opacity: 1}))
    ]),
    transition(':leave', [
      // animation and styles at end of transition
      animate(interval, style({opacity: 0}))
    ]),
  ]);

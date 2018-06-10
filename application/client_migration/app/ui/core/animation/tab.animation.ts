import { trigger, state, animate, transition, style } from '@angular/animations';

export const MV_ANIMATION_TAB: any =
  trigger('tab', [
    state('active', style({ position: 'relative', opacity: 1, transform: 'translateX(0)', 'z-index': 1})),
    state('inactive', style({position: 'fixed', display: 'block', opacity: 0, transform: 'translateX(10px)', 'z-index':-1  })),

    transition('*<=>*', [
      animate('0.3s', style({ opacity: 1 })),
    ]),

    transition(':enter', [
      style('*'),
      // animation and styles at end of transition
      animate('0.3s'),
    ]),



  ]);

import { trigger, state, animate, transition, style, query, keyframes } from '@angular/animations';

export const MV_ANIMATION_ROUTE_DEFAULT: any =
  trigger('routeDefault', [
    state('*',
      style({
        display: 'block',
        opacity: 1,
        transform: 'translateX(0)'
      })
    ),
    transition(':enter', [
      style({
        position: 'absolute',
        opacity: 0,
        transform: 'translateX(100%)'
      }),
      animate('0.3s 0.5s ease-in')
    ]),
    transition(':leave', [
      animate('0.3s 0.5s ease-out', style({
        position: 'absolute',
        opacity: 0,
        transform: 'translateX(-100%)'
      }))
    ])
  ]);

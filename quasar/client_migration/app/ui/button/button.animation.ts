import { trigger, state, style, transition, animate } from '@angular/animations';

export const ButtonTopAnimation = trigger('appearInOut', [
  state('in', style({
    'display': 'block',
    'opacity': '1'
  })),
  state('out', style({
    'display': 'none',
    'opacity': '0'
  })),
  transition('in => out', animate('400ms ease-in-out')),
  transition('out => in', animate('400ms ease-in-out'))
]);

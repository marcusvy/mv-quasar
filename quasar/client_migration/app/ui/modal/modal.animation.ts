import { animate, trigger, state, transition, style } from '@angular/animations';

export const ModalAnimation = trigger('modalAnimation', [
  state('opened', style({ display: 'flex', opacity: 1 })),
  state('closed', style({ display: 'none', opacity: 0 })),
  transition('opened <=> closed', animate(300)),
]);

export const ModalBoxAnimation = trigger('modalBoxAnimation', [
  state('opened', style({ transform: 'scale(1)', opacity: 1 })),
  state('closed', style({ transform: 'scale(0)', opacity: 0 })),
  transition('opened <=> closed', animate(300)),
]);

export const ModalBackdropAnimation = trigger('modalBackdropAnimation', [
  state('show', style({ opacity: 1 })),
  state('hide', style({ opacity: 0 })),
  transition('show <=> hide', animate(500)),
]);

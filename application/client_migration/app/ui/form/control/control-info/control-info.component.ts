import { Component, Renderer2 } from '@angular/core';
import { AbstractControl } from '../abstract-control';

@Component({
  selector: 'mv-control-info',
  templateUrl: './control-info.component.html'
})
export class ControlInfoComponent
  extends AbstractControl {

  constructor(_renderer: Renderer2) {
    super(_renderer);
  }

  setupInitalValue() {
    return null;
  }

}

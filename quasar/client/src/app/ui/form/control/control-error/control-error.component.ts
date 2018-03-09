import {Component, OnInit, Input, HostBinding} from '@angular/core';
import {AbstractControl} from '@angular/forms';

@Component({
  selector: 'mv-control-error',
  templateUrl: './control-error.component.html',
  styleUrls: [
    './control-error.component.scss',
    './control-error.theme.scss',
  ]
})
export class ControlErrorComponent implements OnInit {

  private control: AbstractControl;
  @Input('for') _for: boolean = false;

  constructor() {
  }

  ngOnInit() {
  }

  registerControl(control: AbstractControl) {
    this.control = control;
  }

  @HostBinding('class.is-hidden')
  get isVisible() {
    return (this.control !== undefined) ? this.control.valid : false;
  }

}

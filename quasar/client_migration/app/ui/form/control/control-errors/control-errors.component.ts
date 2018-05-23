import {Component, Input, OnChanges, OnInit} from '@angular/core';
import {ValidationErrors} from '@angular/forms';

@Component({
  selector: 'mv-control-errors',
  templateUrl: './control-errors.component.html',
  styleUrls: [
    './control-errors.component.scss',
    './control-errors.theme.scss',
  ]
})
export class ControlErrorsComponent implements OnInit, OnChanges {

  @Input('errors') errors: ValidationErrors = {};
  errorList = [];
  visible = false;

  constructor() {
  }

  ngOnInit() {
    this.generateList();
  }

  ngOnChanges() {
    this.generateList();
  }

  isVisible() {
    return this.errorList.length > 0;
  }

  generateList() {
    this.errorList = [];
    if ((typeof this.errors) === 'object') {
      for (const errorKey in this.errors) {
        const error = this.errors[errorKey];
        if ((typeof error) === 'string') {
          this.errorList.push(error);
        }
      }
    }
  }

}

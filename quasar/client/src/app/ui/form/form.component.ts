import { FormGroup } from '@angular/forms';
import { Component, OnInit, OnDestroy, AfterContentInit, ContentChildren, QueryList, Input } from '@angular/core';

import { ControlComponent } from './control/control.component';

@Component({
  selector: 'mv-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent implements OnInit {

  @ContentChildren(ControlComponent) private controls: QueryList<ControlComponent>;
  @Input() formGroup:FormGroup;

  constructor() { }

  ngOnInit() {
  }
  
}

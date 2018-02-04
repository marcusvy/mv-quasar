import {Component, OnInit} from '@angular/core';
import {FormBuilder, FormGroup} from '@angular/forms';

@Component({
  selector: 'mv-config-settings',
  templateUrl: './config-settings.component.html',
  styleUrls: ['./config-settings.component.scss']
})
export class ConfigSettingsComponent implements OnInit {

  form: FormGroup;

  constructor(private _fb: FormBuilder) {
  }

  ngOnInit() {
    this.createForm();
  }

  createForm() {
    this.form = this._fb.group({
      fix_mode_enabled: [true],
      log_mode_enabled: [false],
      log_level: [1],
    });
  }

}

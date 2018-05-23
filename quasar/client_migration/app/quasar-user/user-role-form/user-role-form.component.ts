import { Component, OnInit, Output, EventEmitter, Input } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'app-user-role-form',
  templateUrl: './user-role-form.component.html',
  styleUrls: ['./user-role-form.component.scss']
})
export class UserRoleFormComponent implements OnInit {

  @Output() onSave: EventEmitter<any> = new EventEmitter();
  form: FormGroup;

  constructor(private _fb: FormBuilder) { }

  ngOnInit() {
    this.form = this._fb.group({
      name: ['', Validators.compose([Validators.required])],
    });
  }

  save() {
    if (this.form.valid) {
      this.onSave.emit(this.form.value);
    }
  }

}

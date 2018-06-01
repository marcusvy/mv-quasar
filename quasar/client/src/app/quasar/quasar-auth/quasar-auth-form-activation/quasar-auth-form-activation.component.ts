import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { FormErrorHydrator, AuthFormActivationValue } from '../../lib';


@Component({
  selector: "mv-quasar-auth-form-activation",
  templateUrl: "./quasar-auth-form-activation.component.html",
  styleUrls: ["./quasar-auth-form-activation.component.scss"]
})
export class QuasarAuthFormActivationComponent implements OnInit {
  form: FormGroup;
  @Output() onActivate: EventEmitter<AuthFormActivationValue> = new EventEmitter();

  constructor(private _fb: FormBuilder) {}

  ngOnInit() {
    this.createForm();
  }

  createForm() {
    this.form = this._fb.group({
      identity: ["", Validators.compose([Validators.required])],
      activation: ["", Validators.compose([Validators.required])],
    });
  }

  hydrateErrors(error) {
    FormErrorHydrator.hydrate(this.form, error);
  }

  activate() {
    if (this.form.valid) {
      this.onActivate.emit(this.form.value);
    }
  }
}

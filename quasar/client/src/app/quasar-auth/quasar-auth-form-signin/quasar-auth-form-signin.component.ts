import { Component, OnInit, Output, EventEmitter } from "@angular/core";
import { FormGroup, FormBuilder, Validators } from "@angular/forms";
import { Subscription } from "rxjs";
import { AuthService } from "../auth.service";
import { Router } from "@angular/router";
import { FormErrorHydrator } from "../../lib";

interface FormSigninValue {
  name?: string;
  identity?: string;
  email?: string;
  credential?: string;
}

@Component({
  selector: "mv-quasar-auth-form-signin",
  templateUrl: "./quasar-auth-form-signin.component.html",
  styleUrls: ["./quasar-auth-form-signin.component.scss"]
})
export class QuasarAuthFormSigninComponent implements OnInit {
  form: FormGroup;
  @Output() onSignin: EventEmitter<FormSigninValue> = new EventEmitter();

  constructor(private _fb: FormBuilder) {}

  ngOnInit() {
    this.createForm();
  }

  createForm() {
    this.form = this._fb.group({
      name: ["", Validators.compose([Validators.required])],
      identity: ["", Validators.compose([Validators.required])],
      email: ["", Validators.compose([Validators.required, Validators.email])],
      credential: ["", Validators.compose([Validators.required])]
    });
  }

  hydrateErrors(error) {
    FormErrorHydrator.hydrate(this.form, error);
  }
  signin() {
    if (this.form.valid) {
      this.onSignin.emit(this.form.value);
    }
  }
}

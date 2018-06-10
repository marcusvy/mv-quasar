import { Component, OnInit, Input, Output, EventEmitter } from "@angular/core";
import { FormGroup, FormBuilder, Validators } from "@angular/forms";
import { Subscription, BehaviorSubject, Observable } from "rxjs";
import { FormErrorHydrator, AuthFormLoginValue } from "../../lib";



@Component({
  selector: "mv-quasar-auth-form-login",
  templateUrl: "./quasar-auth-form-login.component.html",
  styleUrls: ["./quasar-auth-form-login.component.scss"]
})
export class QuasarAuthFormLoginComponent implements OnInit {
  form: FormGroup;
  @Output() onLogin: EventEmitter<AuthFormLoginValue> = new EventEmitter();

  constructor(private _fb: FormBuilder) {}

  ngOnInit(): void {
    this.createForm();
  }

  createForm() {
    this.form = this._fb.group({
      identity: ["", Validators.compose([Validators.required])],
      credential: ["", Validators.compose([Validators.required])]
    });
  }
  hydrateErrors(error) {
    FormErrorHydrator.hydrate(this.form, error);
  }

  login() {
    if (this.form.valid) {
      const formData = this.form.value;
      this.onLogin.emit(this.form.value);
    }
  }
}

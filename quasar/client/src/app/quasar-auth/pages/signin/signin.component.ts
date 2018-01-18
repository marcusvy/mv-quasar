import { Component, OnInit, OnDestroy } from '@angular/core';
import { FormBuilder, FormGroup, Validators, Validator } from '@angular/forms';
import { Router } from '@angular/router';
import { Subscription } from 'rxjs/Subscription';

import { AuthService } from './../../shared/service/auth.service';

@Component({
  selector: 'im-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.scss']
})
export class SigninComponent implements OnInit, OnDestroy {

  form: FormGroup;
  message: string = '';
  $sign: Subscription;
  send: boolean = false;
  loading: boolean = false;

  constructor(
    private _fb: FormBuilder,
    private _service: AuthService,
    private _router: Router,
  ) { }

  ngOnInit() {
    this.createForm();
  }

  ngOnDestroy(): void {
    if (this.$sign !== undefined) {
      this.$sign.unsubscribe();
    }
  }

  createForm() {
    this.form = this._fb.group({
      name: ['', Validators.compose([Validators.required])],
      credential: ['', Validators.compose([Validators.required])],
      email: ['', Validators.compose([Validators.required, Validators.email])],
      password: ['', Validators.compose([Validators.required])],
    });
  }

  back() {
    this._router.navigate(['quasar', 'auth']);
  }

  signin() {
    if (this.form.valid) {
      this.loading = true;
      let formData = this.form.value;

      this.$sign = this._service.signin(formData)
        .delay(1000)
        .subscribe(res => {
          this.send = res['success'];
          if (res['success']) {
            this.message = 'Verifique seu e-mail para confirmar seu cadastro e receber sua senha';
          }
          if (res['message'] !== undefined) {
            this.message = res['message'];
          }
        }, (err) => {
          this.send = false;
          this.message = 'Verifique seu e-mail para confirmar seu cadastro e receber sua senha';
        },
        () => {
          this.loading = false;
        })
    }
  }



}

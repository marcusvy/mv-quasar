import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators, Validator } from '@angular/forms';
import { Router } from '@angular/router';

import { AuthService } from './../../shared/service/auth.service';

@Component({
  selector: 'im-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  form: FormGroup;
  message = '';

  constructor(
    private _fb: FormBuilder,
    private _service: AuthService,
    private _router: Router,
  ) { }

  ngOnInit() {
    this.createForm();
  }

  createForm() {
    this.form = this._fb.group({
      identity: ['', Validators.compose([Validators.required])],
      credential: ['', Validators.compose([Validators.required])],
    });
  }

  back() {
    this._router.navigate(['/']);
  }

  login() {
    if (this.form.valid) {
      const formData = this.form.value;
      this._service.authenticate(formData['identity'], formData['credential'])
        .subscribe(res => {
          if (res['success']) {
            this._service.storeToken(res['token']);
            this._router.navigateByUrl('/quasar');
          } else {
            this.message = 'Usuário ou Senha inválidos';
          }
        });
    }
  }

  showMessage() {
    return this.message.length > 0;
  }
}

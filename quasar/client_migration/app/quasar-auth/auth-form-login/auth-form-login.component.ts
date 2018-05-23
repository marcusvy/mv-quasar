import {Component, OnDestroy, OnInit} from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {Router} from '@angular/router';

import {AuthService} from '..';
import {MatSnackBar} from '@angular/material';
import {Subscription} from 'rxjs';

@Component({
    selector: 'mv-auth-form-login',
    templateUrl: './auth-form-login.component.html',
    styleUrls: ['./auth-form-login.component.scss']
})
export class AuthFormLoginComponent implements OnInit, OnDestroy {

    form: FormGroup;
    message = '';
    $sign: Subscription;

    constructor(
        private _fb: FormBuilder,
        private _service: AuthService,
        private _router: Router,
        public snackBar: MatSnackBar
    ) {
    }

    ngOnInit(): void {
        this.createForm();
    }

    ngOnDestroy(): void {
        if (this.$sign !== undefined) {
            this.$sign.unsubscribe();
        }
    }

    createForm() {
        this.form = this._fb.group({
            identity: ['', Validators.compose([Validators.required])],
            credential: ['', Validators.compose([Validators.required])],
        });
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
                        this.snackBar.open('Usuário ou Senha inválidos', '', {
                            duration: 3000,
                        });
                    }
                });
        }
    }

    showMessage() {
        return this.message.length > 0;
    }

}

import {Component, OnInit, OnDestroy} from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {Router} from '@angular/router';
import {Subscription} from 'rxjs/Subscription';

import {AuthService} from '../';
import {FormUtil} from '../../ui/form';

@Component({
  selector: 'mv-auth-form-signin',
  templateUrl: './auth-form-signin.component.html',
  styleUrls: ['./auth-form-signin.component.scss']
})
export class AuthFormSigninComponent implements OnInit, OnDestroy {

    form: FormGroup;
    message = '';
    $sign: Subscription;
    send = false;
    loading = false;

    constructor(private _fb: FormBuilder,
                private _service: AuthService,
                private _router: Router) {
    }

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
            identity: ['', Validators.compose([Validators.required])],
            email: ['', Validators.compose([Validators.required, Validators.email])],
            credential: ['', Validators.compose([Validators.required])],
        });
    }

    back() {
        this._router.navigate(['quasar', 'auth']);
    }

    signin() {
        if (this.form.valid) {
            this.loading = true;
            const formData = this.form.value;

            this.$sign = this._service.signin(formData)
                .subscribe(res => {
                        this.send = res['success'];
                        FormUtil.applyErrors(this.form, res['form']);
                        if (res['success']) {
                            this.message = 'Verifique seu e-mail para confirmar seu cadastro e receber sua senha';
                        }
                        if (res['message'] !== undefined) {
                            this.message = res['message'];
                        }
                    }, (err) => {
                        this.send = false;
                        this.message = 'Erro ao enviar';
                    },
                    () => {
                        this.loading = false;
                    });
        }
    }

    showMessage() {
        return this.message.length > 0;
    }

}

import { NgModule, InjectionToken } from '@angular/core';
import { CommonModule } from '@angular/common';

import { QuasarSharedModule } from '../quasar-shared/quasar-shared.module';
import { QuasarAuthRoutingModule } from './quasar-auth.routing';
import { ForgotPasswordComponent } from './routes/forgot-password/forgot-password.component';
import { AuthenticationComponent } from './routes/authentication/authentication.component';
import { QuasarAuthFormLoginComponent } from './quasar-auth-form-login/quasar-auth-form-login.component';
import { QuasarAuthFormSigninComponent } from './quasar-auth-form-signin/quasar-auth-form-signin.component';
import { AuthService } from './auth.service';
import { AUTH_API_DATASOURCE } from '../config/auth.api.datasource';
import { AuthGuard } from './auth.guard';
import { LogoutComponent } from './routes/logout/logout.component';
import { QuasarAuthComponent } from './quasar-auth.component';
import { QuasarAuthFormActivationComponent } from './quasar-auth-form-activation/quasar-auth-form-activation.component';

@NgModule({
  imports: [
    CommonModule,
    QuasarAuthRoutingModule,
    QuasarSharedModule,
  ],
  declarations: [
    ForgotPasswordComponent,
    AuthenticationComponent,
    QuasarAuthFormLoginComponent,
    QuasarAuthFormSigninComponent,
    LogoutComponent,
    QuasarAuthComponent,
    QuasarAuthFormActivationComponent
  ],
  providers: [
    AuthService,
    { provide: 'ApiDataSource', useValue: AUTH_API_DATASOURCE, multi: true}
  ]
})
export class QuasarAuthModule { }

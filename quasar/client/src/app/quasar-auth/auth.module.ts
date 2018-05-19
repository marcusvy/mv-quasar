import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MvQuasarSharedModule } from '../quasar/shared/quasar-shared.module';

import { MvQuasarAuthRoutingModule } from './auth.routing';

import { AuthComponent } from './auth.component';
import { AuthProfileMenuComponent } from './auth-profile-menu/auth-profile-menu.component';
import { ActivateComponent } from './pages/activate/activate.component';
import { AuthGuard } from './shared/guard/auth.guard';
import { AuthFormLoginComponent } from './auth-form-login/auth-form-login.component';
import { AuthFormSigninComponent } from './auth-form-signin/auth-form-signin.component';

@NgModule({
  imports: [
    CommonModule,
    MvQuasarSharedModule,
    MvQuasarAuthRoutingModule,
  ],
  declarations: [
    AuthProfileMenuComponent,
    ActivateComponent,
    AuthComponent,
    AuthFormLoginComponent,
    AuthFormSigninComponent
  ],
  exports: [
    AuthProfileMenuComponent,
  ],
  providers: [
    AuthGuard
  ]
})
export class MvQuasarAuthModule { }

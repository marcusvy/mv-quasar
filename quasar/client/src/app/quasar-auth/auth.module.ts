import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MvQuasarSharedModule } from '../quasar/shared/quasar-shared.module';

import { MvQuasarAuthRoutingModule } from './auth.routing';

import { AuthComponent } from './auth.component';
import { AuthProfileMenuComponent } from './auth-profile-menu/auth-profile-menu.component';
import { LoginComponent } from './pages/login/login.component';
import { SigninComponent } from './pages/signin/signin.component';
import { ActivateComponent } from './pages/activate/activate.component';
import { AuthGuard } from './shared/guard/auth.guard';

@NgModule({
  imports: [
    CommonModule,
    MvQuasarSharedModule,
    MvQuasarAuthRoutingModule,
  ],
  declarations: [
    AuthProfileMenuComponent,
    LoginComponent,
    SigninComponent,
    ActivateComponent,
    AuthComponent
  ],
  exports: [
    AuthProfileMenuComponent,
  ],
  providers: [
    AuthGuard
  ]
})
export class MvQuasarAuthModule { }

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { MvQuasarRoutingModule } from './quasar.routing';
import { MvQuasarSharedModule } from './shared/quasar-shared.module';
import { MvQuasarAuthModule } from './../quasar-auth/auth.module';

import { QuasarComponent } from './quasar.component';
import { QuasarMenuComponent } from './quasar-menu/quasar-menu.component';
import { DashboardComponent } from './pages/dashboard/dashboard.component';
import { QuasarShellComponent } from './quasar-shell/quasar-shell.component';

@NgModule({
  imports: [
    CommonModule,
    MvQuasarRoutingModule,
    MvQuasarSharedModule,
    MvQuasarAuthModule
  ],
  declarations: [
    QuasarComponent,
    QuasarMenuComponent,
    QuasarShellComponent,
    DashboardComponent,
  ],
})
export class MvQuasarModule { }

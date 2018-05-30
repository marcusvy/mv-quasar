import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { QuasarAdminRoutingModule } from './quasar-admin.routing';
import { QuasarSharedModule } from '../quasar-shared/quasar-shared.module';

import { QuasarDashboardComponent } from './routes/quasar-dashboard/quasar-dashboard.component';
import { QuasarAboutComponent } from './routes/quasar-about/quasar-about.component';

@NgModule({
  imports: [
    CommonModule,
    QuasarAdminRoutingModule,
    QuasarSharedModule
  ],
  declarations: [
    QuasarAboutComponent,
    QuasarDashboardComponent,
  ],
})
export class QuasarAdminModule { }

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { MvQuasarSharedModule } from './../quasar/shared/quasar-shared.module';
import { MvQuasarConfigRoutingModule } from './config.routing';
import { ConfigComponent } from './config.component';
import { ConfigProfileComponent } from './pages/config-profile/config-profile.component';
import { ConfigActivitiesComponent } from './pages/config-activities/config-activities.component';
import { ConfigSettingsComponent } from './pages/config-settings/config-settings.component';

@NgModule({
  imports: [
    CommonModule,
    MvQuasarSharedModule,
    MvQuasarConfigRoutingModule
  ],
  declarations: [
    ConfigComponent,
    ConfigProfileComponent,
    ConfigActivitiesComponent,
    ConfigSettingsComponent
  ]
})
export class MvQuasarConfigModule { }

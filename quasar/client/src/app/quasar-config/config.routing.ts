import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ConfigComponent } from './config.component';
import { ConfigActivitiesComponent } from './pages/config-activities/config-activities.component';
import { ConfigProfileComponent } from './pages/config-profile/config-profile.component';
import { ConfigSettingsComponent } from './pages/config-settings/config-settings.component';

const routes: Routes = [
  {
    path: '', component: ConfigComponent, children: [
      { path: '', redirectTo: 'settings', pathMatch: 'full' },
      { path: 'settings', component: ConfigSettingsComponent },
      { path: 'activities', component: ConfigActivitiesComponent },
      { path: 'profile', component: ConfigProfileComponent },
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class MvQuasarConfigRoutingModule { }

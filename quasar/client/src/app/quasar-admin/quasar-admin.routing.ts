import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { QuasarDashboardComponent } from './routes/quasar-dashboard/quasar-dashboard.component';
import { QuasarAboutComponent } from './routes/quasar-about/quasar-about.component';

const routes: Routes = [
  { path: '', pathMatch: 'full', component: QuasarDashboardComponent },
  { path: 'about', component: QuasarAboutComponent },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class QuasarAdminRoutingModule { }

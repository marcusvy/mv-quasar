import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { QuasarShellComponent } from './quasar-shared/quasar-shell/quasar-shell.component';
import { QuasarDashboardComponent } from './quasar-shared/quasar-dashboard/quasar-dashboard.component';
import { QuasarAboutComponent } from './quasar-shared/quasar-about/quasar-about.component';

const routes: Routes = [
  { path: '', pathMatch: 'full', component: QuasarDashboardComponent },
  { path: 'about', component: QuasarAboutComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { QuasarShellComponent } from './quasar-shared/quasar-shell/quasar-shell.component';
import { QuasarDashboardComponent } from './quasar-shared/quasar-dashboard/quasar-dashboard.component';

const routes: Routes = [
  {
    path: '', pathMatch: 'full', component: QuasarDashboardComponent,
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { QuasarComponent } from './quasar.component';
import { DashboardComponent } from './pages/dashboard/dashboard.component';
import { QuasarShellComponent } from './quasar-shell/quasar-shell.component';
import { AuthGuard } from '../quasar-auth/shared/guard/auth.guard';

const routes: Routes = [
  {
    path: '', component: QuasarComponent, children: [
      { path: '', redirectTo: '/quasar/manager', pathMatch: 'full' },
      { path: 'auth', loadChildren: 'app/quasar-auth/auth.module#MvQuasarAuthModule' },
    ]
  },
  {
    path: 'manager',
    component: QuasarShellComponent,
    canActivate: [AuthGuard],
    children: [
      { path: '', component: DashboardComponent, pathMatch: 'full' },
      { path: 'config', loadChildren: 'app/quasar-config/config.module#MvQuasarConfigModule' },
      { path: 'midia', loadChildren: 'app/quasar-midia/midia.module#MvQuasarMidiaModule' },
      { path: 'user', loadChildren: 'app/quasar-user/user.module#MvQuasarUserModule' },
    ]
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class MvQuasarRoutingModule { }

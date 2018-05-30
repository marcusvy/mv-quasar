import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

export const QUASAR_ROUTES: Routes = [
  // Redirect to default module
  // {
  //    path: 'area', loadChildren: 'app/area/area.module#AreaModule',
  //    canActivate: [AuthGuard],
  //    canLoad: [AuthGuard]
  // },
  { path: '', redirectTo: '/quasar', pathMatch: 'full' },
  { path: 'quasar', loadChildren: './quasar-admin/quasar-admin.module#QuasarAdminModule' },
];

@NgModule({
  imports: [RouterModule.forRoot(QUASAR_ROUTES)],
  exports: [RouterModule]
})
export class QuasarRoutingModule { }

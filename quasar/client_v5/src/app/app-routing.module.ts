import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
// import { AuthGuard } from './quasar-auth';

// const routes: Routes = [];

const routes: Routes = [
  // { path: '', redirectTo: '/quasar', pathMatch: 'full' },
  // { path: 'imc', loadChildren: './imc/imc.module#ImcModule' },
  // {
    // path: 'area-candidato', loadChildren: 'app/area-candidato/area-candidato.module#AreaCandidatoModule',
    // canActivate: [AuthGuard],
    // canLoad: [AuthGuard]
  // },
  // { path: 'quasar', loadChildren: './quasar/quasar.module#MvQuasarModule' },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
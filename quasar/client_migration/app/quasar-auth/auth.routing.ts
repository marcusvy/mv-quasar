import { AuthComponent } from './auth.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ActivateComponent } from './pages/activate/activate.component';

const routes: Routes = [
  { path: '', component: AuthComponent, children: [
    // { path: '', component: AuthComponent, pathMatch: 'full' },
    { path: 'activate/for/:credential/by/:key', component: ActivateComponent },
  ]}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class MvQuasarAuthRoutingModule { }

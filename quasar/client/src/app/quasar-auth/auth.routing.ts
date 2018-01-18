import { AuthComponent } from './auth.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './pages/login/login.component';
import { SigninComponent } from './pages/signin/signin.component';
import { ActivateComponent } from './pages/activate/activate.component';

const routes: Routes = [
  { path: '', component: AuthComponent, children: [
    { path: '', component: LoginComponent, pathMatch: 'full' },
    { path: 'activate/:key', component: ActivateComponent },
    { path: 'signin', component: SigninComponent },
  ]}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class MvQuasarAuthRoutingModule { }

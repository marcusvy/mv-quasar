import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { UserComponent } from './user.component';
import { UserDashboardComponent } from './pages/user-dashboard/user-dashboard.component';
import { UserManagerComponent } from './pages/user-manager/user-manager.component';
import { UserRoleManagerComponent } from './pages/user-role-manager/user-role-manager.component';

const routes: Routes = [
  { path: '', component: UserComponent, children: [
    { path: '', redirectTo: 'dashboard', pathMatch: 'full' },
    { path: 'dashboard', component: UserDashboardComponent },
    { path: 'manager', component: UserManagerComponent },
    { path: 'manager-role', component: UserRoleManagerComponent },
  ]}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class MvQuasarUserRoutingModule { }

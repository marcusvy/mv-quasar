import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MvQuasarSharedModule } from './../quasar/shared/quasar-shared.module';

import { MvQuasarUserRoutingModule } from './user.routing';
import { UserComponent } from './user.component';
import { UserDashboardComponent } from './pages/user-dashboard/user-dashboard.component';
import { UserManagerComponent } from './pages/user-manager/user-manager.component';
import { UserItemComponent } from './user-item/user-item.component';
import { UserFormComponent } from './user-form/user-form.component';
import { UserRoleManagerComponent } from './pages/user-role-manager/user-role-manager.component';
import { UserRoleFormComponent } from './user-role-form/user-role-form.component';
import { UserRoleItemComponent } from './user-role-item/user-role-item.component';

@NgModule({
  imports: [
    CommonModule,
    MvQuasarSharedModule,
    MvQuasarUserRoutingModule,
  ],
  declarations: [
    UserComponent,
    UserDashboardComponent,
    UserManagerComponent,
    UserItemComponent,
    UserFormComponent,
    UserRoleManagerComponent,
    UserRoleFormComponent,
    UserRoleItemComponent
  ]
})
export class MvQuasarUserModule { }

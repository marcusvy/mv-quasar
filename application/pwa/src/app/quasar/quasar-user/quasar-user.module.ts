import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";

import { QuasarSharedModule } from "../quasar-shared/quasar-shared.module";
import { QuasarUserRoutingModule } from "./quasar-user.routing";
import {
  MatTableModule,
  MatPaginatorModule,
  MatSortModule,
  MatGridListModule,
  MatCardModule,
  MatMenuModule,
  MatIconModule,
  MatButtonModule
} from "@angular/material";
import { UserListComponent } from "./routes/user-list/user-list.component";
import { RoleListComponent } from "./routes/role-list/role-list.component";
import { UserDashboardComponent } from "./routes/user-dashboard/user-dashboard.component";
import { QuasarUserComponent } from "./quasar-user.component";
import { USER_API_DATASOURCE } from "../config/user.api.datasource";

@NgModule({
  imports: [
    CommonModule,
    QuasarUserRoutingModule,
    QuasarSharedModule,
    MatTableModule,
    MatPaginatorModule,
    MatSortModule,
    MatGridListModule,
    MatCardModule,
    MatMenuModule,
    MatIconModule,
    MatButtonModule
  ],
  declarations: [
    UserListComponent,
    RoleListComponent,
    UserDashboardComponent,
    QuasarUserComponent
  ],
  providers: [
    { provide: 'ApiDataSource', useValue: USER_API_DATASOURCE, multi: true }
  ]
})
export class QuasarUserModule {}

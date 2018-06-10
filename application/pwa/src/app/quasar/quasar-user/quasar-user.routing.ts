import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { UserDashboardComponent } from "./routes/user-dashboard/user-dashboard.component";
import { UserListComponent } from "./routes/user-list/user-list.component";
import { RoleListComponent } from "./routes/role-list/role-list.component";
import { QuasarUserComponent } from "./quasar-user.component";

const routes: Routes = [
  { path: "", redirectTo:'user'},
  {
    path: "user",
    component: QuasarUserComponent,
    children: [
      { path: "", component: UserDashboardComponent },
      // { path: "", redirectTo: "list" },
      { path: "list", component: UserListComponent }
    ]
  },
  {
    path: "role",
    component: QuasarUserComponent,
    children: [
      { path: "", redirectTo: "list" },
      { path: "list", component: RoleListComponent }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class QuasarUserRoutingModule {}

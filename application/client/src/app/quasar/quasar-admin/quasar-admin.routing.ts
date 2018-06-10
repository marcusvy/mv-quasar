import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";

import { QuasarAdminComponent } from "./quasar-admin.component";
import { QuasarDashboardComponent } from "./routes/quasar-dashboard/quasar-dashboard.component";
import { QuasarAboutComponent } from "./routes/quasar-about/quasar-about.component";

const routes: Routes = [
  {
    path: "",
    component: QuasarAdminComponent,
    children: [
      { path: "", component: QuasarDashboardComponent },
      { path: "about", component: QuasarAboutComponent },
      {
        path: "config",
        loadChildren: "../quasar-config/quasar-config.module#QuasarConfigModule"
      },
      {
        path: "users",
        loadChildren: "../quasar-user/quasar-user.module#QuasarUserModule"
      },
      { path: "**", component: QuasarDashboardComponent }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class QuasarAdminRoutingModule {}

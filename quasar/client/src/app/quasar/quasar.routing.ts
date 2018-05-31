import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { QuasarErrorPageComponent } from "./routes/quasar-error-page/quasar-error-page.component";
import { AuthGuard } from "./quasar-auth/auth.guard";

export const QUASAR_ROUTES: Routes = [
  // Redirect to default module
  // {
  //    path: 'area', loadChildren: 'app/area/area.module#AreaModule',
  //    canActivate: [AuthGuard],
  //    canLoad: [AuthGuard]
  // },
  { path: "", redirectTo: "/quasar/admin", pathMatch: "full" },
  {
    path: "auth",
    loadChildren: "./quasar-auth/quasar-auth.module#QuasarAuthModule"
  },
  {
    path: "admin",
    canActivate: [AuthGuard],
    // canLoad:[AuthGuard],
    canActivateChild: [AuthGuard],
    loadChildren: "./quasar-admin/quasar-admin.module#QuasarAdminModule"
  },
  { path: "**", component: QuasarErrorPageComponent }
];

@NgModule({
  imports: [RouterModule.forChild(QUASAR_ROUTES)],
  exports: [RouterModule]
})
export class QuasarRoutingModule {}


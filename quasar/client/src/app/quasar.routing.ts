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
  { path: "", redirectTo: "/quasar/auth", pathMatch: "full" },
  {
    path: "quasar/auth",
    loadChildren: "./quasar-auth/quasar-auth.module#QuasarAuthModule"
  },
  {
    path: "quasar",
    canActivate: [AuthGuard],
    // canLoad:[AuthGuard],
    canActivateChild:[AuthGuard],
    loadChildren: "./quasar-admin/quasar-admin.module#QuasarAdminModule"
  },
  { path: "**", component: QuasarErrorPageComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(QUASAR_ROUTES)],
  exports: [RouterModule]
})
export class QuasarRoutingModule {}


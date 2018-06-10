import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";

const ROUTES: Routes = [
  { path: "", redirectTo: "web", pathMatch: "full" },
  {
    path: "web",
    loadChildren: "./website/website.module#WebsiteModule"
  },
  {
    path: "quasar",
    loadChildren: "./quasar/quasar.module#QuasarModule"
  }
  // { path: "**", component: QuasarErrorPageComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(ROUTES)],
  exports: [RouterModule]
})
export class AppRoutingModule {}

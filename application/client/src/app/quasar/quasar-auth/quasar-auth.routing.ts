import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { AuthenticationComponent } from "./routes/authentication/authentication.component";
import { LogoutComponent } from "./routes/logout/logout.component";
import { QuasarAuthComponent } from "./quasar-auth.component";

const routes: Routes = [
  {
    path: "",
    component: QuasarAuthComponent,
    children: [
      { path: "", component: AuthenticationComponent },
      { path: "logout", component: LogoutComponent }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class QuasarAuthRoutingModule {}

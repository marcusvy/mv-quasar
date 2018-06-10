import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { QuasarConfigComponent } from "./quasar-config.component";
import { GeneralComponent } from "./routes/general/general.component";
import { MailComponent } from "./routes/mail/mail.component";
import { LogComponent } from "./routes/log/log.component";
import { ServerComponent } from "./routes/server/server.component";

const routes: Routes = [
  {
    path: "",
    component: QuasarConfigComponent,
    children: [
      { path: "", component: GeneralComponent },
      { path: "log", component: LogComponent },
      { path: "mail", component: MailComponent },
      { path: "server", component: ServerComponent }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class QuasarConfigRoutingModule {}

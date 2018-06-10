import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";

import { QuasarSharedModule } from "../quasar-shared/quasar-shared.module";
import { QuasarConfigRoutingModule } from "./quasar-config.routing";
import { GeneralComponent } from "./routes/general/general.component";
import { QuasarConfigComponent } from "./quasar-config.component";
import { MailComponent } from "./routes/mail/mail.component";
import { LogComponent } from "./routes/log/log.component";
import { ServerComponent } from "./routes/server/server.component";
import { QuasarConfigLogListComponent } from "./quasar-config-log-list/quasar-config-log-list.component";
import {
  MatTableModule,
  MatPaginatorModule,
  MatSortModule
} from "@angular/material";
import {LOG_API_DATASOURCE} from "../config/log.api.datasource";

@NgModule({
  imports: [
    CommonModule,
    QuasarSharedModule,
    QuasarConfigRoutingModule,
    MatTableModule,
    MatPaginatorModule,
    MatSortModule
  ],
  declarations: [
    GeneralComponent,
    QuasarConfigComponent,
    MailComponent,
    LogComponent,
    ServerComponent,
    QuasarConfigLogListComponent
  ],
  providers:[
    { provide: 'ApiDataSource', useValue: LOG_API_DATASOURCE, multi: true }
  ]
})
export class QuasarConfigModule {}

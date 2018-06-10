import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http';

import { QuasarRoutingModule } from './quasar.routing';
import { QuasarSharedModule } from "./quasar-shared/quasar-shared.module";
import { QuasarUiModule } from "./quasar-ui/quasar-ui.module";
import { QuasarErrorPageComponent } from "./routes/quasar-error-page/quasar-error-page.component";
import { QuasarOfflineComponent } from "./routes/quasar-offline/quasar-offline.component";
import { QuasarComponent } from './quasar.component';
import { AuthGuard } from "./quasar-auth/auth.guard";

@NgModule({
  imports: [
    CommonModule,
    QuasarRoutingModule,
    QuasarSharedModule,
    QuasarUiModule,
  ],
  declarations: [
    QuasarComponent,
    QuasarErrorPageComponent,
    QuasarOfflineComponent
  ],
  providers: [AuthGuard]
})
export class QuasarModule {}

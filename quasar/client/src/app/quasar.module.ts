import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { ServiceWorkerModule } from '@angular/service-worker';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { QuasarRoutingModule } from './quasar.routing';
import { QuasarSharedModule } from './quasar-shared/quasar-shared.module';
import { AppComponent } from './app.component';
import { environment } from '../environments/environment';
import { QuasarUiModule } from './quasar-ui/quasar-ui.module';
import { QuasarErrorPageComponent } from './routes/quasar-error-page/quasar-error-page.component';
import { QuasarOfflineComponent } from './routes/quasar-offline/quasar-offline.component';
import { AuthGuard } from './quasar-auth/auth.guard';

@NgModule({
  declarations: [
    AppComponent,
    QuasarErrorPageComponent,
    QuasarOfflineComponent,
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    QuasarRoutingModule,
    QuasarSharedModule,
    QuasarUiModule,
    HttpClientModule,
    ServiceWorkerModule.register('/ngsw-worker.js', { enabled: environment.production })
  ],
  providers: [
    AuthGuard
  ],
  bootstrap: [AppComponent]
})
export class AppModule {
}

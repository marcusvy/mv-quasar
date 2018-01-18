
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { LOCALE_ID, NgModule } from '@angular/core';


import { AppRoutingModule } from './app.routing';

import { ServiceWorkerModule } from '@angular/service-worker';
import { AppComponent } from './app.component';

import { environment } from '../environments/environment';

// 0. Configuration
import { QuasarConfigService } from './quasar/shared/service/quasar-config.service';

// 1. Authentication configuration
import { AuthGuard, AuthService } from './quasar-auth';

// 2. Localization
import { registerLocaleData } from '@angular/common';
import localePt from '@angular/common/locales/pt';
registerLocaleData(localePt, 'pt');

// 3. User interface
import { MvUiModule } from "./ui";

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    AppRoutingModule,
    ServiceWorkerModule.register('/ngsw-worker.js', { enabled: environment.production }),
    // 3. User Interface
    MvUiModule,
  ],
  providers: [
    //0. Configuration
    QuasarConfigService,
    //1. Authentication
    AuthGuard,
    AuthService,
    // 2. Localization
    { provide: LOCALE_ID, useValue: 'pt'}
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }

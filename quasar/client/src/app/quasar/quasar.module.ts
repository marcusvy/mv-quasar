import {LOCALE_ID, ModuleWithProviders, NgModule, Optional, SkipSelf} from '@angular/core';
import {CommonModule} from '@angular/common';

import {MvQuasarRoutingModule} from './quasar.routing';
import {MvQuasarSharedModule} from './shared/quasar-shared.module';
import {MvQuasarAuthModule} from '../quasar-auth/auth.module';

import {QuasarComponent} from './quasar.component';
import {QuasarMenuComponent} from './quasar-menu/quasar-menu.component';
import {DashboardComponent} from './pages/dashboard/dashboard.component';
import {QuasarShellComponent} from './quasar-shell/quasar-shell.component';
import {AuthGuard} from '../quasar-auth';

import {QuasarConfigService} from './shared/service/quasar-config.service';
import {AuthService} from '../quasar-auth';

import {registerLocaleData} from '@angular/common';
import localePt from '@angular/common/locales/pt';
import {QuasarStatusComponent} from './quasar-status/quasar-status.component';

registerLocaleData(localePt, 'pt');

@NgModule({
  imports: [
    CommonModule,
    MvQuasarRoutingModule,
    MvQuasarSharedModule,
    MvQuasarAuthModule
  ],
  declarations: [
    QuasarComponent,
    QuasarMenuComponent,
    QuasarShellComponent,
    DashboardComponent,
    QuasarStatusComponent,
  ],
})
export class MvQuasarModule {
  // constructor(@Optional() @SkipSelf() parentModule: MvQuasarModule) {
  //   if (parentModule) {
  //     throw new Error(
  //       'MvQuasarModule is already loaded. Import it in the AppModule only');
  //   }
  // }

  static forRoot(): ModuleWithProviders {
    return {
      ngModule: MvQuasarModule,
      providers: [
        QuasarConfigService,
        AuthGuard,
        AuthService,
        {provide: LOCALE_ID, useValue: 'pt'}
      ],
    };
  }
}

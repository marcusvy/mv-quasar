import {NgModule} from '@angular/core';
import {HTTP_INTERCEPTORS} from '@angular/common/http';
import {ReactiveFormsModule} from '@angular/forms';
import {MvUiModule} from '../../ui';

import {QuasarConfigService} from './service/quasar-config.service';
import {QuasarServerStatusService} from './service/quasar-server-status.service';
import {QuasarOnlineStatusService} from './service/quasar-online-status.service';

@NgModule({
  exports: [
    MvUiModule,
    ReactiveFormsModule,
  ],
  providers: [
    QuasarConfigService,
    QuasarOnlineStatusService,
    QuasarServerStatusService,
    {
      provide: HTTP_INTERCEPTORS,
      useClass: QuasarServerStatusService,
      multi: true,
    }
  ]
})
export class MvQuasarSharedModule {
}

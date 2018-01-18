import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';
import { MvUiModule } from './../../ui/ui.module';

import { QuasarConfigService } from './service/quasar-config.service';

@NgModule({
  exports: [
    MvUiModule,
    ReactiveFormsModule,
  ],
  providers: [
    QuasarConfigService
  ]
})
export class MvQuasarSharedModule { }

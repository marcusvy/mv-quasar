import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { QuasarSharedModule } from '../quasar-shared/quasar-shared.module';

const QUASAR_UI_COMPONENTS = [];

@NgModule({
  imports: [
    CommonModule,
    QuasarSharedModule,
  ],
  declarations: [
    ...QUASAR_UI_COMPONENTS
  ],
  exports: [
    ...QUASAR_UI_COMPONENTS
  ]
})
export class QuasarUiModule { }

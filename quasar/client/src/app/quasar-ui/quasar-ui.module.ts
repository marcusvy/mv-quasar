import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { QuasarSharedModule } from '../quasar-shared/quasar-shared.module';
import { QuasarMenuComponent } from './quasar-menu/quasar-menu.component';
import { QuasarShellComponent } from './quasar-shell/quasar-shell.component';

const QUASAR_UI_COMPONENTS = [
  QuasarMenuComponent,
  QuasarShellComponent,
];

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

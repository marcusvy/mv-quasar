import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MvQuasarSharedModule } from './../quasar/shared/quasar-shared.module';

import { MvQuasarMidiaRoutingModule } from './midia.routing';
import { MidiaComponent } from './midia.component';
import { MidiaDashboardComponent } from './pages/midia-dashboard/midia-dashboard.component';
import { MidiaManagerComponent } from './pages/midia-manager/midia-manager.component';
import { MidiaStatsComponent } from './pages/midia-stats/midia-stats.component';
import { MidiaUploaderComponent } from './midia-uploader/midia-uploader.component';

@NgModule({
  imports: [
    CommonModule,
    MvQuasarMidiaRoutingModule,
    MvQuasarSharedModule,
  ],
  declarations: [
    MidiaComponent,
    MidiaDashboardComponent,
    MidiaManagerComponent,
    MidiaUploaderComponent,
    MidiaStatsComponent,
  ],
  exports: [
    MidiaComponent,
    MidiaDashboardComponent,
  ]
})
export class MvQuasarMidiaModule { }

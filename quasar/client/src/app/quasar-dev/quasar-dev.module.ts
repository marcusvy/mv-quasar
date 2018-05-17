import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { QuasarDevRoutingModule } from './quasar-dev-routing.module';
import { IconsetComponent } from './pages/iconset/iconset.component';
import { SharedModule } from '../shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    QuasarDevRoutingModule,
    SharedModule
  ],
  declarations: [IconsetComponent],
  exports:[
    IconsetComponent
  ]
})
export class QuasarDevModule { }

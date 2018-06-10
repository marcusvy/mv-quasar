import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { WebsiteRoutingModule } from './website.routing';
import { WebsiteComponent } from './website.component';
import { QuasarSharedModule } from '../quasar/quasar-shared/quasar-shared.module';

@NgModule({
  imports: [
    CommonModule,
    WebsiteRoutingModule,
    QuasarSharedModule,
  ],
  declarations: [WebsiteComponent]
})
export class WebsiteModule { }

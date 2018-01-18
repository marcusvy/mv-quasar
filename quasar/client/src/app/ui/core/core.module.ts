import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http';
import { ReactiveFormsModule } from '@angular/forms';

import { PipeModule } from './pipe/pipe.module';
import { ConfigService } from './config.service';
import { ConnectionService } from './connection.service';
import { CounterDirective } from './validator/counter.directive';

@NgModule({
  imports: [
    PipeModule
  ],
  declarations: [
    CounterDirective,
  ],
  exports: [
    CommonModule,
    ReactiveFormsModule,
    HttpClientModule,
    PipeModule,
    CounterDirective,
  ],
  providers: [
    ConfigService,
    ConnectionService,
  ],
})
export class CoreModule { }

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HTTP_INTERCEPTORS } from '@angular/common/http';

import { LoadbarComponent } from './loadbar.component';
import { LoadbarService } from './loadbar.service';
import { LoadbarInterceptor } from './loadbar.interceptor';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    LoadbarComponent
  ],
  exports: [
    LoadbarComponent
  ],
  providers: [
    LoadbarService,
    {
      provide: HTTP_INTERCEPTORS,
      useClass: LoadbarInterceptor,
      multi: true
    }
  ]
})
export class LoadbarModule { }

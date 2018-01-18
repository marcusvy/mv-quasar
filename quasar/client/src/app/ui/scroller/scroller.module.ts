import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ScrollerDirective } from './scroller.directive';
import { ScrollerComponent } from './scroller.component';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    ScrollerDirective,
    ScrollerComponent
  ],
  exports: [
    ScrollerDirective,
    ScrollerComponent
  ]
})
export class ScrollerModule { }

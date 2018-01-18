import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { GridModule } from './../grid/grid.module';

import { SectionComponent } from './section.component';

@NgModule({
  imports: [
    CommonModule,
    GridModule,
  ],
  declarations: [
    SectionComponent,
  ],
  exports: [
    SectionComponent
  ]
})
export class SectionModule { }

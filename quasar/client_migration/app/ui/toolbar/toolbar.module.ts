import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { GridModule } from './../grid/grid.module';

import { ToolbarComponent } from './toolbar.component';

@NgModule({
  imports: [
    CommonModule,
    GridModule,
  ],
  declarations: [ToolbarComponent],
  exports: [
    ToolbarComponent
  ]
})
export class ToolbarModule { }

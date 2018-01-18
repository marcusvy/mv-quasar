import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { GridComponent } from './grid.component';
import { ColComponent } from './col/col.component';
import { RowComponent } from './row/row.component';
import { ContainerComponent } from './container/container.component';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    GridComponent,
    ColComponent,
    RowComponent,
    ContainerComponent,
  ],
  exports: [
    GridComponent,
    ColComponent,
    RowComponent,
    ContainerComponent,
  ]
})
export class GridModule { }

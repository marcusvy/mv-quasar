import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { GridModule } from './../grid/grid.module';

import { ListComponent } from './list.component';
import { ListItemComponent } from './list-item/list-item.component';
import { ListDivisorDirective } from './list-divisor.directive';
import { ListHeaderDirective } from './list-header.directive';

@NgModule({
  imports: [
    CommonModule,
    GridModule
  ],
  declarations: [
    ListComponent,
    ListDivisorDirective,
    ListItemComponent,
    ListHeaderDirective,
  ],
  exports: [
    ListComponent,
    ListDivisorDirective,
    ListItemComponent,
    ListHeaderDirective,
  ],
})
export class ListModule { }

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { GridModule } from './../grid/grid.module';

import { ListComponent } from './list.component';
import { ListItemComponent } from './list-item/list-item.component';
import { ListItemPrimaryDirective } from './list-item/list-item-primary.directive';
import { ListItemSecondaryDirective } from './list-item/list-item-secondary.directive';
import { ListItemActionDirective } from './list-item/list-item-action.directive';
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
    ListItemPrimaryDirective,
    ListItemSecondaryDirective,
    ListItemActionDirective,
    ListHeaderDirective,
  ],
  exports: [
    ListComponent,
    ListDivisorDirective,
    ListItemComponent,
    ListItemPrimaryDirective,
    ListItemSecondaryDirective,
    ListItemActionDirective,
    ListHeaderDirective,
  ],
})
export class ListModule { }

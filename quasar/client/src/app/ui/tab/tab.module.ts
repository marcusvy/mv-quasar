import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ButtonModule } from '../button/button.module';
import { GridModule } from './../grid/grid.module';
import { IconModule } from '../icon/icon.module';

import { TabComponent } from './tab.component';
import { TabGroupComponent } from './tab-group/tab-group.component';

@NgModule({
  imports: [
    CommonModule,
    ButtonModule,
    GridModule,
    IconModule,
  ],
  declarations: [
    TabComponent,
    TabGroupComponent,
  ],
  exports: [
    TabComponent,
    TabGroupComponent,
  ]
})
export class TabModule { }

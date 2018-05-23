import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ButtonModule } from './../../button/button.module';
import { IconModule } from './../../icon/icon.module';
import { GridModule } from './../../grid/grid.module';
import { ToolbarModule } from './../../toolbar/toolbar.module';

import { SidebarComponent } from './sidebar.component';

@NgModule({
  imports: [
    CommonModule,
    ButtonModule,
    IconModule,
    GridModule,
    ToolbarModule,
  ],
  declarations: [
    SidebarComponent
  ],
  exports: [
    SidebarComponent
  ]
})
export class SidebarModule { }

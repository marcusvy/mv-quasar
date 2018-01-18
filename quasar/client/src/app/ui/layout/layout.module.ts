import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { GridModule } from './../grid/grid.module';
import { SidebarModule } from './sidebar/sidebar.module';

import { LayoutComponent } from './layout.component';

@NgModule({
  imports: [
    CommonModule,
    GridModule,
    SidebarModule,
  ],
  declarations: [
    LayoutComponent
  ],
  exports: [
    LayoutComponent,
    SidebarModule
  ]
})
export class LayoutModule { }

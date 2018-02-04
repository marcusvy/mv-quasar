import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ButtonModule } from '../button/button.module';
import { GridModule } from './../grid/grid.module';
import { IconModule } from '../icon/icon.module';
import { LayoutModule } from './../layout/layout.module';
import { LoadbarModule } from './../loadbar/loadbar.module';
import { MenuModule } from '../menu/menu.module';
import { ToolbarModule } from '../toolbar/toolbar.module';

import { ShellComponent } from './shell.component';
import { ShellHeaderDirective } from './shell-header.directive';
import { ShellLeftDirective } from './shell-left.directive';
import { ShellRightDirective } from './shell-right.directive';
import { ShellHeaderComponent } from './shell-header/shell-header.component';

@NgModule({
  imports: [
    CommonModule,
    ButtonModule,
    GridModule,
    IconModule,
    LayoutModule,
    LoadbarModule,
    MenuModule,
    ToolbarModule,
  ],
  declarations: [
    ShellComponent,
    ShellHeaderDirective,
    ShellLeftDirective,
    ShellRightDirective,
    ShellHeaderComponent
  ],
  exports: [
    ShellComponent,
    ShellHeaderDirective,
    ShellLeftDirective,
    ShellRightDirective
  ]
})
export class ShellModule { }

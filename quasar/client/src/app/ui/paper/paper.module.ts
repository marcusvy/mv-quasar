import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ButtonModule } from './../button/button.module';
import { GridModule } from './../grid/grid.module';
import { ToolbarModule } from './../toolbar/toolbar.module';

import { PaperComponent } from './paper.component';
import { PageComponent } from './page/page.component';

@NgModule({
  imports: [
    CommonModule,
    ButtonModule,
    GridModule,
    ToolbarModule,
  ],
  declarations: [
    PaperComponent,
    PageComponent
  ],
  exports: [
    PaperComponent,
    PageComponent
  ]
})
export class PaperModule { }

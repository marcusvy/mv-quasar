import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ButtonModule } from '../button/button.module';
import { GridModule } from './../grid/grid.module';
import { ToolbarModule } from '../toolbar/toolbar.module';

import { HeroComponent } from './hero.component';

@NgModule({
  imports: [
    CommonModule,
    ButtonModule,
    GridModule,
    ToolbarModule,
  ],
  declarations: [
    HeroComponent,
  ],
  exports: [
    HeroComponent,
  ],
})
export class HeroModule { }

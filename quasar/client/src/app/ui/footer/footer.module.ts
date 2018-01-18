import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AvatarModule } from '../avatar/avatar.module';
import { GridModule } from './../grid/grid.module';
import { ToolbarModule } from './../toolbar/toolbar.module';

import { FooterComponent } from './footer.component';
import { FooterAboutDirective } from './footer-about.directive';
import { FooterDevComponent } from './footer-dev/footer-dev.component';

@NgModule({
  imports: [
    CommonModule,
    GridModule,
    ToolbarModule,
    AvatarModule,
  ],
  declarations: [
    FooterComponent,
    FooterAboutDirective,
    FooterDevComponent,
  ],
  exports: [
    FooterComponent,
    FooterAboutDirective,
    FooterDevComponent,
  ],
})
export class FooterModule { }

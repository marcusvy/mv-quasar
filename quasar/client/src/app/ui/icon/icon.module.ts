import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IconComponent } from './icon.component';
import { IconService } from "./icon.service";
import { IconsetComponent } from './iconset/iconset.component';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    IconComponent,
    IconsetComponent,
  ],
  exports: [
    IconComponent,
    IconsetComponent,
  ],
  providers: [IconService]
})
export class IconModule { }

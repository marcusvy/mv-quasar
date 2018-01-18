import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ButtonComponent } from './button.component';
import { ButtonTopDirective } from './button-top.directive';

@NgModule({
  imports: [
    CommonModule,
  ],
  declarations: [
    ButtonComponent,
    ButtonTopDirective,
  ],
  exports: [
    ButtonComponent,
    ButtonTopDirective,
  ],
})
export class ButtonModule { }

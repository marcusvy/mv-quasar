import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ControlModule } from './control/control.module';
import { InputMaskModule } from './input-mask/input-mask.module';

import { FormComponent } from './form.component';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    FormComponent,
  ],
  exports: [
    ControlModule,
    InputMaskModule,
    FormComponent,
  ]
})
export class FormModule { }

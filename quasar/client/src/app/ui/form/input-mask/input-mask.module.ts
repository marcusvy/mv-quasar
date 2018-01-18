import { InputMaskService } from './input-mask.service';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { InputMaskDirective } from './input-mask.directive';

@NgModule({
  imports: [
    CommonModule,
  ],
  declarations: [
    InputMaskDirective
  ],
  exports: [
    InputMaskDirective,
  ],
  providers:[
    InputMaskService
  ]
})
export class InputMaskModule { }

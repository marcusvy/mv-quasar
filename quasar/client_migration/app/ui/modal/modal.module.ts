import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ButtonModule } from '../button/button.module';
import { IconModule } from '../icon/icon.module';
import { GridModule } from './../grid/grid.module';
import { ToolbarModule } from './../toolbar/toolbar.module';

import { ModalComponent } from './modal.component';
import { ModalBodyDirective } from './modal-body.directive';
import { ModalFooterDirective } from './modal-footer.directive';

@NgModule({
  imports: [
    CommonModule,
    ButtonModule,
    IconModule,
    GridModule,
    ToolbarModule,
  ],
  declarations: [
    ModalComponent,
    ModalBodyDirective,
    ModalFooterDirective,
  ],
  exports: [
    ModalComponent,
    ModalBodyDirective,
    ModalFooterDirective,
  ]
})
export class ModalModule { }

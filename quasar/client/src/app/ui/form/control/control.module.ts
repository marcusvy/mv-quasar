import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';

import { AvatarModule } from '../../avatar/avatar.module';
import { ButtonModule } from '../../button/button.module';
import { GridModule } from './../../grid/grid.module';
import { IconModule } from '../../icon/icon.module';
import { ModalModule } from '../../modal/modal.module';
import { PipeModule } from '../../core/pipe/pipe.module';

import { ControlComponent } from './control.component';
import { ControlActionDirective } from './control-action.directive';
import { ControlContainerDirective } from './control-container.directive';
import { ControlDirective } from './control.directive';
import { ControlErrorComponent } from './control-error/control-error.component';
import { ControlInfoComponent } from './control-info/control-info.component';
import { ControlInputComponent } from './control-input/control-input.component';
import { ControlLabelDirective } from './control-label.directive';
import { ControlMessageDirective } from './control-message.directive';
import { ControlOptionsDirective } from './control-select/control-options.directive';
import { ControlSelectComponent } from './control-select/control-select.component';
import { ControlSetupDirective } from './control-setup.directive';
import { ControlToggleComponent } from './control-toggle/control-toggle.component';
import { ControlValueDirective } from './control-value.directive';
import { ControlEditorComponent } from './control-editor/control-editor.component';
import { ControlEditorAreaDirective } from './control-editor/control-editor-area.directive';
import { ControlFileComponent } from './control-file/control-file.component';
import { ControlFileItemComponent } from './control-file/control-file-item/control-file-item.component';
import { ControlFileAreaComponent } from './control-file/control-file-area/control-file-area.component';
import { ControlDateComponent } from './control-date/control-date.component';
import { ControlRowDirective } from './control-row.directive';


@NgModule({
  imports: [
    AvatarModule,
    ButtonModule,
    CommonModule,
    IconModule,
    GridModule,
    ModalModule,
    PipeModule,
    ReactiveFormsModule,
  ],
  declarations: [
    ControlComponent,
    ControlDirective,
    ControlActionDirective,
    ControlContainerDirective,
    ControlErrorComponent,
    ControlInfoComponent,
    ControlInputComponent,
    ControlLabelDirective,
    ControlMessageDirective,
    ControlOptionsDirective,
    ControlSelectComponent,
    ControlSetupDirective,
    ControlToggleComponent,
    ControlValueDirective,
    ControlEditorComponent,
    ControlEditorAreaDirective,
    ControlFileComponent,
    ControlFileItemComponent,
    ControlFileAreaComponent,
    ControlDateComponent,
    ControlRowDirective,
  ],
  exports: [
    ControlActionDirective,
    ControlComponent,
    ControlDirective,
    ControlErrorComponent,
    ControlInfoComponent,
    ControlInputComponent,
    ControlLabelDirective,
    ControlMessageDirective,
    ControlOptionsDirective,
    ControlSelectComponent,
    ControlSetupDirective,
    ControlToggleComponent,
    ControlValueDirective,
    ControlEditorComponent,
    ControlDateComponent,
    ControlFileComponent,
    ControlRowDirective,
  ]
})
export class ControlModule { }

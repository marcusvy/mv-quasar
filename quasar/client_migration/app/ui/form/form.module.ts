import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';
import {ControlModule} from './control/control.module';
import {InputMaskModule} from './input-mask/input-mask.module';

import {FormComponent} from './form.component';
import { FormServerErrorPipe } from './pipe/form-server-error.pipe';

@NgModule({
    imports: [
        CommonModule
    ],
    declarations: [
        FormComponent,
        FormServerErrorPipe,
    ],
    exports: [
        ControlModule,
        InputMaskModule,
        FormComponent,
        FormServerErrorPipe,
    ]
})
export class FormModule {
}

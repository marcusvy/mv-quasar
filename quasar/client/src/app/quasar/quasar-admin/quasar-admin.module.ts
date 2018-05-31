import {NgModule} from '@angular/core';
import {CommonModule} from '@angular/common';

import {QuasarAdminRoutingModule} from './quasar-admin.routing';
import {QuasarSharedModule} from '../quasar-shared/quasar-shared.module';

import {QuasarAdminComponent} from './quasar-admin.component';
import {QuasarShellComponent} from './quasar-shell/quasar-shell.component';
import {QuasarMenuComponent} from './quasar-menu/quasar-menu.component';
import {QuasarDashboardComponent} from './routes/quasar-dashboard/quasar-dashboard.component';
import {QuasarAboutComponent} from './routes/quasar-about/quasar-about.component';

@NgModule({
    imports: [
        CommonModule,
        QuasarAdminRoutingModule,
        QuasarSharedModule
    ],
    declarations: [
        QuasarAdminComponent,
        QuasarMenuComponent,
        QuasarShellComponent,
        QuasarAboutComponent,
        QuasarDashboardComponent,
    ],
})
export class QuasarAdminModule {
}

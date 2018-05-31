import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {QuasarDashboardComponent} from './routes/quasar-dashboard/quasar-dashboard.component';
import {QuasarAboutComponent} from './routes/quasar-about/quasar-about.component';
import {QuasarAdminComponent} from './quasar-admin.component';

const routes: Routes = [
    {
        path: '',component: QuasarAdminComponent, children: [
            {path: '', component: QuasarDashboardComponent},
            {path: 'dashboard', redirectTo: './dashboard'},
            {path: 'about', component: QuasarAboutComponent},
            {path: '**', component: QuasarDashboardComponent}
        ]
    }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class QuasarAdminRoutingModule {
}

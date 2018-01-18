import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { MidiaComponent } from './midia.component';
import { MidiaDashboardComponent } from './pages/midia-dashboard/midia-dashboard.component';
import { MidiaManagerComponent } from './pages/midia-manager/midia-manager.component';

const routes: Routes = [
  { path: '', component: MidiaComponent, children: [
    { path: '', redirectTo: 'dashboard', pathMatch: 'full' },
    { path: 'dashboard', component: MidiaDashboardComponent },
    { path: 'manager', component: MidiaManagerComponent },
  ]}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class MvQuasarMidiaRoutingModule { }

import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AreaCandidatoComponent } from './area-candidato.component';
import { HomeComponent } from './pages/home/home.component';
import { InscricaoComponent } from './pages/inscricao/inscricao.component';
import { ConcursosComponent } from './pages/concursos/concursos.component';
import { DadosComponent } from './pages/dados/dados.component';

const routes: Routes = [
  { path: '', component: AreaCandidatoComponent,children: [
    { path: '', component: HomeComponent, pathMatch: 'full' },
    { path: 'dados-pessoais', component: DadosComponent },
    { path: 'concursos', component: ConcursosComponent },
    { path: 'inscricao', component: InscricaoComponent },
  ] }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AreaCandidatoRoutingModule { }

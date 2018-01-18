import { ImcSharedModule } from './../imc/shared/imc-shared.module';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { AreaCandidatoRoutingModule } from './area-candidato.routing';
import { AreaCandidatoComponent } from './area-candidato.component';
import { HomeComponent } from './pages/home/home.component';
import { AreaCandidatoMenuComponent } from './components/area-candidato-menu/area-candidato-menu.component';
import { DadosComponent } from './pages/dados/dados.component';
import { InscricaoComponent } from './pages/inscricao/inscricao.component';
import { ConcursosComponent } from './pages/concursos/concursos.component';
import { FormInscricaoComponent } from './components/form-inscricao/form-inscricao.component';

@NgModule({
  imports: [
    CommonModule,
    ImcSharedModule,
    AreaCandidatoRoutingModule,
  ],
  declarations: [
    AreaCandidatoComponent,
    HomeComponent,
    AreaCandidatoMenuComponent,
    DadosComponent,
    InscricaoComponent,
    ConcursosComponent,
    FormInscricaoComponent
  ],
})
export class AreaCandidatoModule { }

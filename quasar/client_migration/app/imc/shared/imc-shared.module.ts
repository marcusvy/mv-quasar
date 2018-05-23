
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';
import { MvUiModule } from './../../ui/ui.module';
import { VagaService } from './services/vaga.service';
import { LotacaoService } from './services/lotacao.service';
import { InscricaoService } from './services/inscricao.service';
import { ConcursoInfoService } from './services/concurso-info.service';
import { ConcursoService } from './services/concurso.service';
import { CandidatoService } from './services/candidato.service';
import { ConcursoFileService } from './services/concurso-file.service';
import { MicroareaService } from './services/microarea.service';

@NgModule({
  exports: [
    MvUiModule,
    ReactiveFormsModule,
  ],
  providers:[
    CandidatoService,
    ConcursoService,
    ConcursoFileService,
    ConcursoInfoService,
    InscricaoService,
    LotacaoService,
    MicroareaService,
    VagaService
  ]
})
export class ImcSharedModule { }

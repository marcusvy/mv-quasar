import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ImcSharedModule } from './shared/imc-shared.module';

import { ImcRoutingModule } from './imc.routing';
import { HomeComponent } from './pages/home/home.component';
import { MenuComponent } from './components/menu/menu.component';
import { FooterComponent } from './components/footer/footer.component';
import { HeaderComponent } from './components/header/header.component';
import { ConcursoComponent } from './pages/concurso/concurso.component';
import { ContatoComponent } from './pages/contato/contato.component';
import { ArchiveListComponent } from './components/archive-list/archive-list.component';

@NgModule({
  imports: [
    CommonModule,
    ImcRoutingModule,
    ImcSharedModule,
  ],
  declarations: [
    HomeComponent,
    MenuComponent,
    FooterComponent,
    HeaderComponent,
    ConcursoComponent,
    ContatoComponent,
    ArchiveListComponent
  ]
})
export class ImcModule { }

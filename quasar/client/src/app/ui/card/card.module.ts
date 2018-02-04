import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CardComponent } from './card.component';
import { CardTextDirective } from './card-text.directive';
import { CardActionDirective } from './card-action.directive';
import { CardMenuDirective } from './card-menu.directive';
import { CardBodyDirective } from './card-body.directive';
import { CardTitleDirective } from './card-title.directive';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    CardComponent,
    CardTextDirective,
    CardActionDirective,
    CardMenuDirective,
    CardBodyDirective,
    CardTitleDirective,
  ],
  exports: [
    CardComponent,
    CardTextDirective,
    CardActionDirective,
    CardMenuDirective,
    CardBodyDirective,
    CardTitleDirective,
  ]
})
export class CardModule { }

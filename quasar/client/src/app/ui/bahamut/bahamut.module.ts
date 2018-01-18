import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';

import { ButtonModule } from './../button/button.module';
import { FormModule } from './../form/form.module';
import { GridModule } from './../grid/grid.module';
import { IconModule } from './../icon/icon.module';
import { ListModule } from './../list/list.module';
import { LoadbarModule } from '../loadbar/loadbar.module';
import { MenuModule } from '../menu/menu.module';
import { ModalModule } from './../modal/modal.module';
import { TabModule } from './../tab/tab.module';
import { ToolbarModule } from './../toolbar/toolbar.module';

import { BahamutService } from './bahamut.service';
import { BahamutComponent } from './bahamut.component';
import { BahamutDashboardDirective } from './directives/bahamut-dashboard.directive';
import { BahamutCollectionComponent } from './bahamut-collection/bahamut-collection.component';
import { BahamutCollectionControlComponent } from './bahamut-collection/bahamut-collection-control/bahamut-collection-control.component';
import { BahamutCollectionSearchComponent } from './bahamut-collection/bahamut-collection-search/bahamut-collection-search.component';
import { BahamutPaginatorComponent } from './bahamut-collection/bahamut-paginator/bahamut-paginator.component';
import { BahamutFormComponent } from './bahamut-form/bahamut-form.component';

@NgModule({
  imports: [
    CommonModule,
    ReactiveFormsModule,
    ButtonModule,
    GridModule,
    IconModule,
    FormModule,
    ListModule,
    ModalModule,
    MenuModule,
    ToolbarModule,
    LoadbarModule,
    TabModule,
  ],
  declarations: [
    BahamutComponent,
    BahamutDashboardDirective,
    BahamutCollectionComponent,
    BahamutCollectionSearchComponent,
    BahamutCollectionControlComponent,
    BahamutFormComponent,
    BahamutPaginatorComponent,
  ],
  exports:[
    BahamutComponent,
    BahamutDashboardDirective,
    BahamutCollectionComponent,
    BahamutFormComponent,
  ],
  providers:[
    BahamutService
  ]
})
export class BahamutModule { }

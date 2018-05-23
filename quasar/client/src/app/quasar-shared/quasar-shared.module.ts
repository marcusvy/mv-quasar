import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
// import { FlexLayoutModule } from '@angular/flex-layout';
import { LayoutModule } from '@angular/cdk/layout';
import {
  MatCheckboxModule,
  MatDatepickerModule,
  MatFormFieldModule,
  MatInputModule,
  MatRadioModule,
  MatSelectModule,
  MatSliderModule,
  MatSlideToggleModule,
  MatMenuModule,
  MatSidenavModule,
  MatToolbarModule,
  MatCardModule,
  MatDividerModule,
  MatExpansionModule,
  MatGridListModule,
  MatListModule,
  MatStepperModule,
  MatTabsModule,
  MatTreeModule,
  MatButtonModule,
  MatButtonToggleModule,
  MatBadgeModule,
  MatChipsModule,
  MatIconModule,
  MatProgressSpinnerModule,
  MatProgressBarModule,
  MatBottomSheetModule,
  MatDialogModule,
  MatSnackBarModule,
  MatTooltipModule,
  MatTableModule,
  MatPaginatorModule,
  MatSortModule
} from '@angular/material';

import { QuasarShellComponent } from './quasar-shell/quasar-shell.component';
import { QuasarDashboardComponent } from './quasar-dashboard/quasar-dashboard.component';
import { QuasarMenuComponent } from './quasar-menu/quasar-menu.component';

const ACTIVE_MATERIAL_COMPONENTS = [
  MatCheckboxModule,
  MatDatepickerModule,
  MatFormFieldModule,
  MatInputModule,
  MatRadioModule,
  MatSelectModule,
  MatSliderModule,
  MatSlideToggleModule,
  MatMenuModule,
  MatSidenavModule,
  MatToolbarModule,
  MatCardModule,
  MatDividerModule,
  MatExpansionModule,
  MatGridListModule,
  MatListModule,
  MatStepperModule,
  MatTabsModule,
  MatTreeModule,
  MatButtonModule,
  MatButtonToggleModule,
  MatBadgeModule,
  MatChipsModule,
  MatIconModule,
  MatProgressSpinnerModule,
  MatProgressBarModule,
  MatBottomSheetModule,
  MatDialogModule,
  MatSnackBarModule,
  MatTooltipModule,
];

@NgModule({
  imports: [
    CommonModule,
    LayoutModule,
    MatToolbarModule,
    MatButtonModule,
    MatSidenavModule,
    MatIconModule,
    MatListModule,
    MatGridListModule,
    MatCardModule,
    MatMenuModule,
    MatTableModule,
    MatPaginatorModule,
    MatSortModule,
    MatExpansionModule,
    // FlexLayoutModule,
  ],
  declarations: [
    QuasarShellComponent,
    QuasarDashboardComponent,
    QuasarMenuComponent,
  ],
  exports: [
    ...ACTIVE_MATERIAL_COMPONENTS,
    QuasarShellComponent,
    QuasarDashboardComponent,
    QuasarMenuComponent,
  ],
})
export class QuasarSharedModule { }

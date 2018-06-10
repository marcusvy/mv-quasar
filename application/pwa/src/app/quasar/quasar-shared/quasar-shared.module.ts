import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { FormsModule, ReactiveFormsModule } from "@angular/forms";
import { FlexLayoutModule } from "@angular/flex-layout";
import { LayoutModule } from "@angular/cdk/layout";
import {
  MatBadgeModule,
  MatBottomSheetModule,
  MatButtonModule,
  MatButtonToggleModule,
  MatCardModule,
  MatCheckboxModule,
  MatChipsModule,
  MatDatepickerModule,
  MatDialogModule,
  MatDividerModule,
  MatExpansionModule,
  MatFormFieldModule,
  MatGridListModule,
  MatIconModule,
  MatInputModule,
  MatListModule,
  MatMenuModule,
  MatPaginatorModule,
  MatProgressBarModule,
  MatProgressSpinnerModule,
  MatRadioModule,
  MatSelectModule,
  MatSidenavModule,
  MatSliderModule,
  MatSlideToggleModule,
  MatSnackBarModule,
  MatSortModule,
  MatStepperModule,
  MatTableModule,
  MatTabsModule,
  MatToolbarModule,
  MatTooltipModule,
  MatTreeModule
} from "@angular/material";
import { QuasarApiService } from "./quasar-api.service";
import { SHARED_API_DATASOURCE } from "../config/shared.api.datasource";
import { QuasarServerFormErrorPipe } from "./pipe/quasar-server-form-error.pipe";
import { QuasarTypewriterPipe } from "./pipe/quasar-typewriter.pipe";
import { HTTP_INTERCEPTORS } from "@angular/common/http";
import { QuasarServerStatusService } from "./service/quasar-server-status.service";
import { QuasarRoutingModule } from "../quasar.routing";
import { RouterModule } from "@angular/router";
import { QuasarApiDatasourceService } from "./quasar-api-datasource.service";
import { QuasarLogService } from "./service/quasar-log.service";

@NgModule({
  exports: [
    FormsModule,
    ReactiveFormsModule,
    FlexLayoutModule,
    LayoutModule,
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
    MatSortModule,
    QuasarServerFormErrorPipe,
    QuasarTypewriterPipe,
  ],
  providers: [
    {
      provide: "ApiDataSource",
      useValue: SHARED_API_DATASOURCE,
      multi: true
    },
    {
      provide: HTTP_INTERCEPTORS,
      useClass: QuasarServerStatusService,
      multi: true
    },
    QuasarApiService,
    QuasarApiDatasourceService,
    QuasarLogService,
    QuasarServerFormErrorPipe,
    QuasarTypewriterPipe,
    QuasarServerStatusService,
  ],
  declarations: [
    QuasarServerFormErrorPipe,
    QuasarTypewriterPipe,
  ]
})
export class QuasarSharedModule {}

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ButtonModule } from './../button/button.module';

import { CalendarComponent } from './calendar.component';
import { CalendarDayComponent } from './calendar-day/calendar-day.component';
import { CalendarMonthComponent } from './calendar-month/calendar-month.component';
import { CalendarWeekComponent } from './calendar-week/calendar-week.component';
import { CalendarYearComponent } from './calendar-year/calendar-year.component';
import { CalendarService } from './calendar.service';

@NgModule({
  imports: [
    CommonModule,
    ButtonModule,
  ],
  declarations: [
    CalendarComponent,
    CalendarDayComponent,
    CalendarMonthComponent,
    CalendarWeekComponent,
    CalendarYearComponent,
  ],
  exports: [
    CalendarComponent
  ],
  providers: [
    CalendarService
  ]
})
export class CalendarModule { }

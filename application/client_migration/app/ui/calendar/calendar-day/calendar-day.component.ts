import { Component, OnInit, Input, LOCALE_ID, Inject, OnDestroy, Output, EventEmitter } from '@angular/core';
import { CalendarService } from './../calendar.service';

import { Calendario } from './../shared/lib/Calendario';
import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import { Subscription } from 'rxjs/Subscription';
import * as dfIsToday from 'date-fns/is_today';
import * as dfIsSameDay from 'date-fns/is_same_day';
import * as dfIsSameMonth from 'date-fns/is_same_month';


@Component({
  selector: 'mv-calendar-day',
  templateUrl: './calendar-day.component.html',
  styleUrls: ['./calendar-day.component.scss']
})
export class CalendarDayComponent implements OnInit, OnDestroy {

  private $calendario: Subscription;
  calendario: Calendario;
  days: Date[] = [];
  daysPrev: Date[] = [];
  daysNext: Date[] = [];
  weekDays: string[] = [];

  constructor( @Inject(LOCALE_ID) private _locale, private service: CalendarService) {}

  ngOnInit() {
    this.$calendario = this.service.calendarioChanges
      .subscribe(calendario => {
        this.calendario = calendario;
        this.days = calendario.days;
        this.daysPrev = calendario.daysPrev;
        this.daysNext = calendario.daysNext;
        this.weekDays = this.calendario.getWeekNames(this._locale);
      });
  }

  ngOnDestroy() {
    this.$calendario.unsubscribe();
  }

  isToday(date: Date | undefined) {
    return (dfIsSameMonth(this.calendario.date, this.calendario.today)) ? dfIsToday(date) : false;
  }

  isSelected(date: Date) {
    return dfIsSameDay(this.calendario.date, date);
  }

  select(day:Date) {
    this.service.emit(day);
  }

}

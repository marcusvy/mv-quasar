import { Component, OnInit, LOCALE_ID, Inject, OnDestroy } from '@angular/core';

import { CalendarService } from './../calendar.service';

import { Calendario } from './../shared/lib/Calendario';
import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import { Subscription } from 'rxjs/Subscription';
import * as dfIsToday from 'date-fns/is_today';
import * as dfIsSameMonth from 'date-fns/is_same_month';
import * as dfIsSameYear from 'date-fns/is_same_year'

@Component({
  selector: 'mv-calendar-year',
  templateUrl: './calendar-year.component.html',
  styleUrls: ['./calendar-year.component.scss']
})
export class CalendarYearComponent implements OnInit, OnDestroy {

  private $calendario: Subscription;
  calendario: Calendario;
  years: Date[];

  constructor(private service: CalendarService) { }

  ngOnInit() {
    this.$calendario = this.service.calendarioChanges
      .subscribe(calendario => {
        this.calendario = calendario;
        this.years = calendario.getDecadeYears(calendario.date);
      });
  }

  ngOnDestroy() {
    this.$calendario.unsubscribe();
  }

  isToday(date: Date | undefined) {
    return (dfIsSameMonth(this.calendario.date, this.calendario.today)) ? dfIsToday(date) : false;
  }

  isSelected(date: Date) {
    return dfIsSameYear(this.calendario.date, date);
  }

  select(day:Date) {
    this.service.emit(day);
  }

}

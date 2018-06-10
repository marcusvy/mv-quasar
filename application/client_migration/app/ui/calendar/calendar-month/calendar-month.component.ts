import { Component, OnInit, LOCALE_ID, Inject, OnDestroy } from '@angular/core';

import { CalendarService } from './../calendar.service';

import { Calendario } from './../shared/lib/Calendario';
import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import { Subscription } from 'rxjs/Subscription';
import * as dfIsToday from 'date-fns/is_today';
import * as dfIsSameMonth from 'date-fns/is_same_month';

@Component({
  selector: 'mv-calendar-month',
  templateUrl: './calendar-month.component.html',
  styleUrls: ['./calendar-month.component.scss']
})
export class CalendarMonthComponent implements OnInit, OnDestroy {

  private $calendario: Subscription;
  calendario: Calendario;
  months: Date[];

  constructor(private service: CalendarService) { }

  ngOnInit() {
    this.$calendario = this.service.calendarioChanges
      .subscribe(calendario => {
        this.calendario = calendario;
        this.months = calendario.getMonths(calendario.date);
      });
  }

  ngOnDestroy() {
    this.$calendario.unsubscribe();
  }

  isToday(date: Date | undefined) {
    return (dfIsSameMonth(this.calendario.date, this.calendario.today)) ? dfIsToday(date) : false;
  }

  isSelected(date: Date) {
    return dfIsSameMonth(this.calendario.date, date);
  }

  select(day:Date) {
    this.service.emit(day);
  }
}

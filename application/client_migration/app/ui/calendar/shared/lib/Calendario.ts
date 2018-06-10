/*
 * Calendario Lib
 * @author Marcus Vinicius da Rocha Gouveia Cardoso <marcusvy@gmail.com>
 * @licence MIT
 */
import * as dfEachDay from "date-fns/each_day";
import * as dfStartOfMonth from 'date-fns/start_of_month';
import * as dfEndOfMonth from 'date-fns/end_of_month';
import * as dfGetDaysInMonth from "date-fns/get_days_in_month";
import * as dfStartOfWeek from 'date-fns/start_of_week';
import * as dfAddMonths from 'date-fns/add_months';
import * as dfAddYears from 'date-fns/add_years';
import * as dfSubMonths from 'date-fns/sub_months';
import * as dfSubYears from 'date-fns/sub_years';

import { CalendarioUtil } from './CalendarioUtil';

export class Calendario {
  date: Date;
  today: Date;
  days: Date[] = [];
  daysPrev: Date[] = [];
  daysNext: Date[] = [];
  firstDayMonth: Date;
  lastDayMonth: Date;

  constructor(date: string | Date = new Date()) {
    this.date = (typeof date === 'string') ? new Date(Date.parse(date)) : ((date instanceof Date) ? date : new Date());
    this.today = new Date();
    this.init();
  }

  init() {
    this.getDays(this.date);
    this.setupLimits()
  }

  getDays(date: Date) {
    this.firstDayMonth = dfStartOfMonth(date);
    this.lastDayMonth = dfEndOfMonth(date);
    this.days = dfEachDay(this.firstDayMonth, this.lastDayMonth);
    return this.days;
  }

  setupLimits() {
    let daysBefore: number = this.firstDayMonth.getDay();
    let daysAfter: number = 6 - this.lastDayMonth.getDay();
    // get last month
    let firstDayPrev = dfAddMonths(this.firstDayMonth, 1);
    let lastDayPrev = dfEndOfMonth(firstDayPrev);
    let daysPrev: Date[] = dfEachDay(firstDayPrev, lastDayPrev);
    if (daysBefore == 0) {
      this.daysPrev = [];
    } else {
      this.daysPrev = daysPrev.slice(-(daysBefore));
    }
    // }
    // get next month
    let firstDayNext = dfSubMonths(this.firstDayMonth, 1);
    let lastDayNext = dfEndOfMonth(firstDayNext);
    let daysNext: Date[] = dfEachDay(firstDayNext, lastDayNext);
    this.daysNext = daysNext.slice(0, daysAfter);
  }

  getWeekNames(locale: string): string[] {
    let options = { weekday: 'short' };
    return [1, 2, 3, 4, 5, 6, 7].map((value) => {
      return (new Date(2017, 0, value)).toLocaleDateString(locale, options);
    });
  }

  getMonths(date: Date): Date[] {
    let year = date.getFullYear();
    let day = date.getDate();
    return [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11].map((value) => {
      return (new Date(year, value, day));
    });
  }

  getYears(date: Date): Date[] {
    let month = date.getMonth();
    let day = date.getDate();

    return [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12].map((value, index) => {
      return (new Date(date.getFullYear() + index, month, day));
    });
  }

  getDecadeYears(date: Date): Date[] {
    let result = [];
    let firstYear = CalendarioUtil.firstYearOfDecade(date);
    for (let i = 0; i < 10; i++) {
      let year = firstYear.getFullYear() + i;
      result.push(new Date(year, date.getMonth(), date.getDate()));
    }
    return result;
  }

  nextMonth(month: number = 1) {
    return dfAddMonths(this.date, month);
  }

  prevMonth(month: number = 1) {
    return dfSubMonths(this.date, month);
  }

  nextYear(year: number = 1) {
    return dfAddYears(this.date, year);
  }

  prevYear(year: number = 1) {
    return dfSubYears(this.date, year);
  }

  nextDecade(decade: number = 1) {
    return dfAddYears(this.date, decade * 10);
  }

  prevDecade(decade: number = 1) {
    return dfSubYears(this.date, decade * 10);
  }

}

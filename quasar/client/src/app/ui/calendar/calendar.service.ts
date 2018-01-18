import { Injectable } from '@angular/core';

import { Calendario } from './shared/lib/Calendario';
import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import { Subscription } from 'rxjs/Subscription';

@Injectable()
export class CalendarService {

  private _calendario: BehaviorSubject<Calendario>;
  calendario: Calendario;

  constructor() {
    this.calendario = new Calendario();
    this._calendario = new BehaviorSubject(this.calendario);
  }

  get calendarioChanges() {
    return this._calendario.asObservable();
  }

  emit(date:string | Date){
    this.calendario = new Calendario(date);
    this._calendario.next(this.calendario);
  }

  today() {
    this.calendario = new Calendario()
    this._calendario.next(this.calendario);
  }

  nextMonth() {
    let month = this.calendario.nextMonth();
    this.emit(month);
  }

  prevMonth() {
    let month = this.calendario.prevMonth();
    this.emit(month);
  }

  nextYear() {
    let year = this.calendario.nextYear();
    this.emit(year);
  }

  prevYear() {
    let year = this.calendario.prevYear();
    this.emit(year);
  }

  nextDecade() {
    let decade = this.calendario.nextDecade();
    this.emit(decade);
  }

  prevDecade() {
    let decade = this.calendario.prevDecade();
    this.emit(decade);
  }

}

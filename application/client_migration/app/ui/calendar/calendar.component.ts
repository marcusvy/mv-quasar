import { Component, OnInit, OnDestroy, Inject, LOCALE_ID, Input } from '@angular/core';
import { CalendarService } from './calendar.service';

import { Calendario } from './shared/lib/Calendario';
import { Subscription } from 'rxjs/Subscription';

@Component({
  selector: 'mv-calendar',
  templateUrl: './calendar.component.html',
  styleUrls: ['./calendar.component.scss']
})
export class CalendarComponent
  implements OnInit, OnDestroy {

  private $calendario: Subscription;
  calendario: Calendario;
  @Input() mode: 'day' | 'month' | 'year' = 'day';

  constructor(private service: CalendarService) {
    this.calendario = new Calendario();
  }

  ngOnInit() {
    this.$calendario = this.service.calendarioChanges
      .subscribe(calendario => {
        this.calendario = calendario;
      });
  }

  ngOnDestroy() {
    this.$calendario.unsubscribe();
  }

  today() {
    this.service.today();
  }

  next() {
    if (this.mode === 'day') {
      this.service.nextMonth();
    } else if (this.mode === 'month') {
      this.service.nextYear();
    } else if (this.mode === 'year') {
      this.service.nextDecade();
    }
  }

  prev() {
    if (this.mode === 'day') {
      this.service.prevMonth();
    } else if (this.mode === 'month') {
      this.service.prevYear();
    } else if (this.mode === 'year') {
      this.service.prevDecade();
    }
  }

  setMode(mode: 'day' | 'month' | 'year' = 'day') {
    this.mode = mode;
  }

  isMode(mode: 'day' | 'month' | 'year' = 'day') {
    return (this.mode === mode);
  }

  resetMode() {
    this.mode = 'day';
  }
}

import { Component } from '@angular/core';
import { BreakpointObserver, Breakpoints, BreakpointState } from '@angular/cdk/layout';
import { Observable, Subscription } from 'rxjs';
import { map } from 'rxjs/operators';

@Component({
  selector: 'mv-quasar-shell',
  templateUrl: './quasar-shell.component.html',
  styleUrls: ['./quasar-shell.component.css']
})
export class QuasarShellComponent {

  isHandset$: Observable<Boolean> = this.breakpointObserver.observe([Breakpoints.Handset])
    .pipe(map((result: BreakpointState) => result.matches));

  constructor(private breakpointObserver: BreakpointObserver) {}

}


import { Component, OnInit, OnDestroy, ViewChild } from '@angular/core';
import { Router, NavigationEnd } from '@angular/router';
import { BreakpointObserver, Breakpoints, BreakpointState } from '@angular/cdk/layout';
import { Observable, Subscription } from 'rxjs';
import { map, filter, switchMap } from 'rxjs/operators';
import { MatSidenav } from '@angular/material';

@Component({
  selector: 'mv-quasar-shell',
  templateUrl: './quasar-shell.component.html',
  styleUrls: ['./quasar-shell.component.scss']
})
export class QuasarShellComponent implements OnInit, OnDestroy {

  @ViewChild('drawer') drawer: MatSidenav;

  route$$: Subscription;
  isHandset$: Observable<Boolean>;

  constructor(
    private _router: Router,
    private _breakpointObserver: BreakpointObserver
  ) {
    this.isHandset$ = this._breakpointObserver.observe([Breakpoints.Handset])
      .pipe(
        map((result: BreakpointState) => result.matches)
      );
  }

  ngOnInit() {
    this.subscribeRouterNavigation();
  }

  ngOnDestroy() {
    this.route$$.unsubscribe();
  }

  subscribeRouterNavigation() {
    this.route$$ = this._router.events
      .pipe(
        filter(event => event instanceof NavigationEnd),
        switchMap((value: any) => this.isHandset$),
    ).subscribe(isHandset => (isHandset && this.drawer.open) ? this.drawer.close() : null);
  }

}


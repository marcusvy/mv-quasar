import { Component, OnInit, ViewChild, Input } from '@angular/core';
import { Router, NavigationEnd } from '@angular/router';
import { HttpClient } from '@angular/common/http';

import { SidebarComponent } from './../layout/sidebar/sidebar.component';
import { SidebarOptions } from './../layout/sidebar/sidebar-options';

import { Subscription } from 'rxjs/Subscription';
import { filter } from 'rxjs/operators'


@Component({
  selector: 'mv-shell',
  templateUrl: './shell.component.html',
  styleUrls: ['./shell.component.scss']
})
export class ShellComponent implements OnInit {

  @Input() leftOptions: SidebarOptions;
  @Input() rightOptions: SidebarOptions;
  @Input() isFullContainer:boolean = false;
  @Input() isLimitedContainer:boolean = false;

  @ViewChild('leftSidebar') leftSidebar: SidebarComponent;
  @ViewChild('rightSidebar') rightSidebar: SidebarComponent;
  private $left: Subscription;

  constructor(private _router: Router) { }

  ngOnInit() {
    if (this.leftSidebar !== undefined) {
      this.$left = this._router.events
        .filter(event => event instanceof NavigationEnd)
        .subscribe(event => { if (this.leftSidebar.isOpen) { this.leftSidebar.close() } });
    }
  }

  onToggleLeft() {
    this.leftSidebar.toggle();
  }

  onToggleRight() {
    this.rightSidebar.toggle();
  }

  hasLeftSidebar() {
    return (this.leftOptions !== undefined && this.leftOptions.enabled);
  }

  hasRightSidebar() {
    return (this.rightOptions !== undefined && this.rightOptions.enabled);
  }

}

import { LoadbarService } from './loadbar.service';
import { Component, OnInit, Input, HostBinding } from '@angular/core';

import { Subscription } from 'rxjs/Subscription';

@Component({
  selector: 'mv-loadbar',
  templateUrl: './loadbar.component.html',
  styleUrls: [
    './loadbar.component.scss',
    './loadbar.theme.scss',
  ],
})
export class LoadbarComponent implements OnInit {

  @Input() progress: number = 0;
  @HostBinding('class.is-active')
  @Input() active;

  statusSubscription: Subscription;

  constructor(private _service: LoadbarService) { }

  ngOnInit() {
    this.statusSubscription = this._service
      .statusChanges
      .subscribe(status => this.active = status);
  }
}

import {Component, OnDestroy, OnInit} from '@angular/core';
import {MV_ANIMATION_FADE_IN} from '../../ui/core/animation';
import {QuasarServerStatusService} from '../shared/service/quasar-server-status.service';
import {QuasarOnlineStatusService} from '../shared/service/quasar-online-status.service';
import {ServerStatus} from '../shared/lib/ServerStatus';

@Component({
  selector: 'mv-quasar-status',
  templateUrl: './quasar-status.component.html',
  styleUrls: ['./quasar-status.component.scss'],
  animations: [MV_ANIMATION_FADE_IN]
})
export class QuasarStatusComponent implements OnInit, OnDestroy {

  online = true;
  server: ServerStatus;

  private _onlineSubscription;
  private _serverStatusSubscription;

  constructor(private _onlineStatus: QuasarOnlineStatusService,
              private _serverStatus: QuasarServerStatusService) {
  }

  ngOnInit() {
    this.watchOnlineStatus();
    this.watchServerErrorStatus();
  }

  ngOnDestroy() {
    if (this._onlineSubscription !== undefined) {
      this._onlineSubscription.unsubscribe();
    }
    if (this._serverStatusSubscription !== undefined) {
      this._serverStatusSubscription.unsubscribe();
    }
  }

  watchOnlineStatus() {
    this._onlineSubscription = this._onlineStatus.onlineChanges.subscribe(online => this.online = online);
    window.addEventListener('online', () => this._onlineStatus.setOnlineStatus(true));
    window.addEventListener('offline', () => this._onlineStatus.setOnlineStatus(false));
  }

  watchServerErrorStatus() {
    // this._serverStatusSubscription = this._serverStatus.
    this._serverStatusSubscription = this._serverStatus.statusChanges
      .subscribe(serverStatus => {
        this.server = serverStatus;
      });
  }

  resetServerStatus() {
    this._serverStatus.reset();
  }

}

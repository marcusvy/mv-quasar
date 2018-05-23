import { Component, OnInit, ViewChild, OnDestroy, ContentChild } from '@angular/core';
import { TabComponent } from './../tab/tab.component';
import { TabGroupComponent } from './../tab/tab-group/tab-group.component';
import { BahamutService } from './bahamut.service';
import { BahamutCollectionComponent } from './bahamut-collection/bahamut-collection.component';
import { ModelMode } from './lib/model/model-mode';
import { Subscription } from 'rxjs/Subscription';

@Component({
  selector: 'mv-bahamut',
  templateUrl: './bahamut.component.html',
  styleUrls: ['./bahamut.component.scss']
})
export class BahamutComponent implements OnInit, OnDestroy {

  @ViewChild('tabs') tabGroup: TabGroupComponent;
  private _$mode: Subscription;
  mode: ModelMode;

  constructor(private _service: BahamutService) { }

  ngOnInit() {
    this._$mode = this._service.modeChanges.subscribe(mode => {
      this.selectTabByMode(mode);
    });
  }

  ngOnDestroy() {
    this._$mode.unsubscribe();
  }

  get tabFormLabel() {
    return (this.mode.edit) ? 'Editar' : 'Adicionar';
  }

  get tabFormIcon() {
    return (this.mode.edit) ? 'pencil' : 'plus';
  }

  selectTab(slug: string) {
    if (this.tabGroup.tabs !== undefined) {
      let tab: TabComponent[] = this.tabGroup.tabs.filter(tab => tab.slug === slug);
      if (tab.length > 0) {
        this.tabGroup.selectTab(tab[0]);
      }
    }
  }

  selectTabByMode(mode: ModelMode) {
    this.mode = mode;


    if (mode.search || mode.delete) {
      this.selectTab('list');
    }
    if (mode.form) {
      this.selectTab('form');
    }
    if (mode.list) {
      this.selectTab('list');
    }
  }

  onSelectTabDashboard() {

  }

  onSelectTabList() {

  }

  onSelectTabForm() {

  }

}

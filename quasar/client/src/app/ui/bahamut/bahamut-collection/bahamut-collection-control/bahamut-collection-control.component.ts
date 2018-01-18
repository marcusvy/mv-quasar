import { Component, OnInit, OnDestroy } from '@angular/core';
import { Subscription } from 'rxjs/Subscription';
import { Observable } from 'rxjs/Observable';
import { BahamutService } from './../../bahamut.service';
import { ModelMode } from './../../lib/model/model-mode';
import { ModelPagination } from './../../lib/model/model-pagination';

@Component({
  selector: 'mv-bahamut-collection-control',
  templateUrl: './bahamut-collection-control.component.html',
  styleUrls: ['./bahamut-collection-control.component.scss']
})
export class BahamutCollectionControlComponent implements OnInit, OnDestroy {

  private _$collection: Subscription;
  private _$mode: Subscription;
  pagination: ModelPagination;
  mode: ModelMode;

  constructor(private _bahamutService: BahamutService) {}

  ngOnInit() {
    this._$collection = this._bahamutService
      .paginationChanges
      .subscribe(model => {
        this.pagination = model;
      });
    this._$mode = this._bahamutService
      .modeChanges
      .subscribe(mode => {
        this.mode = mode;
      })
  }

  ngOnDestroy() {
    this._$collection.unsubscribe();
    this._$mode.unsubscribe();
  }

  toggleSearchMode(){
    (this.mode.search) ? this.mode.disableSearch() : this.mode.enableSearch();
    this.mode.disableForm();
    this.mode.enableList();
    this._bahamutService.setMode(this.mode);
  }

  toggleDeleteMode(){
    (this.mode.delete) ? this.mode.disableDelete() : this.mode.enableDelete();
    this.mode.disableForm();
    this.mode.enableList();
    this._bahamutService.setMode(this.mode);
  }

  formMode(){
    this.mode.disableList();
    this.mode.enableForm();
    this.mode.disableEdit();
    this._bahamutService.setMode(this.mode);
  }

}

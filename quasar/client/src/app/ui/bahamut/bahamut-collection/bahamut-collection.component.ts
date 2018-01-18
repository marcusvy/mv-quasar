import { Component, OnInit, OnDestroy, TemplateRef, Input, ContentChild, AfterContentInit, Output, EventEmitter, ViewChild, HostBinding } from '@angular/core';
import { Subscription } from 'rxjs/Subscription';
import { Observable } from 'rxjs/Observable';

import { BahamutService } from './../bahamut.service';
import { ModalComponent } from './../../modal/modal.component';
import { ModelMode } from './../lib/model/model-mode';
import { ModelPagination } from './../lib/model/model-pagination';

@Component({
  selector: 'mv-bahamut-collection',
  templateUrl: './bahamut-collection.component.html',
  styleUrls: ['./bahamut-collection.component.scss']
})
export class BahamutCollectionComponent implements OnInit, OnDestroy {


  @Input() template: TemplateRef<any>;
  @Output() onSearch: EventEmitter<any> = new EventEmitter();
  @Output() onDelete: EventEmitter<any> = new EventEmitter();
  @Output() onSelect: EventEmitter<any> = new EventEmitter();
  @ViewChild('modalDelete') modalDelete: ModalComponent;
  @ViewChild('modalAlert') modalAlert: ModalComponent;
  private _$collection: Subscription;
  private _$mode: Subscription;
  collectionChanges: Observable<any[]>
  pagination: ModelPagination;
  mode: ModelMode;
  selected: any;

  constructor(private _bahamutService: BahamutService) {
    this.collectionChanges = this._bahamutService.collectionChanges;
  }

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

  onSelectItem(model) {
    this.selected = model;
    this._bahamutService.setSelected(model);
    this.onSelect.emit(model);
  }

  onSelectItemEdit(model) {
    this.mode.enableEdit();
    this.mode.enableForm();
    this.mode.disableList();
    this._bahamutService.setMode(this.mode);
    this.onSelectItem(model);
  }

  onSelectDelete(model) {
    this.selected = model;
    this.modalDelete.open();
  }
  onConfirmDelete() {
    this.onDelete.emit(this.selected);
    this.modalDelete.close();
  }

  onSearchFor($event){
    this.onSearch.emit($event);
  }
}

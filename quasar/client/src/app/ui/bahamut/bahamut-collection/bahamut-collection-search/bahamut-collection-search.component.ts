import { Validators } from '@angular/forms';
import { Component, OnInit, OnDestroy, Output, EventEmitter } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Subscription } from 'rxjs/Subscription';
import { Observable } from 'rxjs/Observable';
import { BahamutService } from './../../bahamut.service';
import { ModelMode } from './../../lib/model/model-mode';
import { ModelPagination } from './../../lib/model/model-pagination';


@Component({
  selector: 'mv-bahamut-collection-search',
  templateUrl: './bahamut-collection-search.component.html',
  styleUrls: ['./bahamut-collection-search.component.scss']
})
export class BahamutCollectionSearchComponent implements OnInit, OnDestroy {

  @Output() onSearch:EventEmitter<any> = new EventEmitter();
  // private _$collection: Subscription;
  private _$mode: Subscription;
  // pagination: ModelPagination;
  mode: ModelMode;
  form: FormGroup;

  constructor(
    private _bahamutService: BahamutService,
    private _fb: FormBuilder
  ) { }

  ngOnInit() {
    // this._$collection = this._bahamutService
    //   .paginationChanges
    //   .subscribe(model => {
    //     this.pagination = model;
    //   });
    this._$mode = this._bahamutService
      .modeChanges
      .subscribe(mode => {
        this.mode = mode;
      });
    this.createForm();
  }

  ngOnDestroy() {
    // this._$collection.unsubscribe();
    this._$mode.unsubscribe();
  }

  createForm() {
    this.form = this._fb.group({
      search: ['', Validators.compose([
        Validators.required
      ])]
    });
  }

  search(){
    if(this.form.valid){
      this.onSearch.emit(this.form.value);
    }
  }


}

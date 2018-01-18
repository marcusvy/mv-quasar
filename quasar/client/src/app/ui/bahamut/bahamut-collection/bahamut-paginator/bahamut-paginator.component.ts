import { Component, OnInit } from '@angular/core';
import { Subscription } from 'rxjs/Subscription';
import { BahamutService } from './../../bahamut.service';
import { ModelPagination } from './../../lib/model/model-pagination';

@Component({
  selector: 'mv-bahamut-paginator',
  templateUrl: './bahamut-paginator.component.html',
  styleUrls: ['./bahamut-paginator.component.scss']
})
export class BahamutPaginatorComponent implements OnInit {

  private _$collection: Subscription;
  pagination: ModelPagination;
  paginatorFormChanges: Subscription;

  constructor(
    private _bahamutService: BahamutService,
    // private _fb: FormBuilder
  ) { }
  private _$paginationAction: Subscription;

  ngOnInit() {
    this._$collection = this._bahamutService
      .paginationChanges
      .subscribe(model => {
        this.pagination = model;
      });
  }

  ngOnDestroy() {
    if (this._$collection !== undefined) {
      this._$collection.unsubscribe();
    }
    if (this._$paginationAction !== undefined) {
      this._$paginationAction.unsubscribe();
    }
  }

  getTotalPages(paginator) {
    return Array(Number(this.pagination.pages)).fill('').map((v, index) => index + 1);
  }

  paginate(url: string) {
    this._$paginationAction = this._bahamutService.action()
      .url(url)
      .do()
      .subscribe((obj: any) => this._bahamutService.setPagination(obj));
  }

  next() {
    if (this.pagination.current <= this.pagination.pages) {
      let page: number = Number(this.pagination.current) + 1;
      let url: string = `${this._bahamutService.getConfig().list}/${page}`;
      this.paginate(url);
    }
  }

  prev() {
    if (this.pagination.current > 1) {
      let page: number = Number(this.pagination.current) - 1;
      let url: string = `${this._bahamutService.getConfig().list}/${page}`;
      this.paginate(url);
    }
  }

  go(page = 0) {
    if (page !== undefined && Number(page) > 0) {
      let url: string = `${this._bahamutService.getConfig().list}/${Number(page)}`;
      this.paginate(url);
    }
  }

}

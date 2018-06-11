import { Component, OnInit, ViewChild } from '@angular/core';
import { MatPaginator, MatSort } from '@angular/material';
import { RoleListDataSource } from './role-list-datasource';
import { QuasarUserRoleService } from '../../../quasar-shared/service/quasar-user-role.service';

@Component({
  selector: 'quasar/quasar-user/routes/role-list',
  templateUrl: './role-list.component.html',
  styleUrls: ['./role-list.component.scss']
})
export class RoleListComponent implements OnInit {
  @ViewChild(MatPaginator) paginator: MatPaginator;
  @ViewChild(MatSort) sort: MatSort;
  dataSource: RoleListDataSource;

  /** Columns displayed in the table. Columns IDs can be added, removed, or reordered. */
  displayedColumns = ['name','id'];

  constructor(private _service:QuasarUserRoleService){}

  ngOnInit() {
    this.dataSource = new RoleListDataSource(this._service,this.paginator, this.sort);
  }
}

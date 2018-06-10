import { Component, OnInit, ViewChild } from "@angular/core";
import { MatPaginator, MatSort } from "@angular/material";
import { QuasarConfigLogListDataSource } from "./quasar-config-log-list-datasource";
import { QuasarLogService } from "../../quasar-shared/service/quasar-log.service";

@Component({
  selector: "quasar/quasar-config/quasar-config-log-list",
  templateUrl: "./quasar-config-log-list.component.html",
  styleUrls: ["./quasar-config-log-list.component.css"]
})
export class QuasarConfigLogListComponent implements OnInit {
  @ViewChild(MatPaginator) paginator: MatPaginator;
  @ViewChild(MatSort) sort: MatSort;
  dataSource: QuasarConfigLogListDataSource;

  constructor(private service: QuasarLogService) {}

  /** Columns displayed in the table. Columns IDs can be added, removed, or reordered. */
  displayedColumns = ["time", "channel", "level", "message"];

  ngOnInit() {
    this.dataSource = new QuasarConfigLogListDataSource(
      this.service,
      this.paginator,
      this.sort
    );
  }
}

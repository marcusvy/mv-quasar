import { DataSource } from "@angular/cdk/collections";
import { MatPaginator, MatSort } from "@angular/material";
import {
  Observable,
  of as observableOf,
  merge,
  Subscription,
  BehaviorSubject
} from "rxjs";
import { map, distinctUntilChanged } from "rxjs/operators";
import { ApiResponse } from "../../../lib";
import { QuasarUserRoleService } from "../../../quasar-shared/service/quasar-user-role.service";

// TODO: Replace this with your own data model type
export interface RoleListItem {
  id: number;
  name: string;
}

/**
 * Data source for the RoleList view. This class should
 * encapsulate all logic for fetching and manipulating the displayed data
 * (including sorting, pagination, and filtering).
 */
export class RoleListDataSource extends DataSource<RoleListItem> {
  data$: BehaviorSubject<RoleListItem[]>;
  data$$: Subscription;

  constructor(
    private service:QuasarUserRoleService,
    private paginator: MatPaginator,
    private sort: MatSort) {
    super();
    this.data$ = new BehaviorSubject([]);
  }

  /**
   * Connect this data source to the table. The table will only update when
   * the returned stream emits new items.
   * @returns A stream of the items to be rendered.
   */
  connect(): Observable<RoleListItem[]> {
    // Combine everything that affects the rendered data into one update
    // stream for the data-table to consume.
    const dataMutations = [
      this.data$.asObservable(),
      this.paginator.page,
      this.sort.sortChange
    ];

    this.subscribeData();

    return merge(...dataMutations).pipe(
      map(() => {
        return this.getPagedData(
          this.getSortedData([...this.data$.getValue()])
        );
      })
    );
  }

  /**
   *  Called when the table is being destroyed. Use this function, to clean up
   * any open connections or free any held resources that were set up during connect.
   */
  disconnect() {
    this.unsubscribeData();
  }

  subscribeData() {
    this.data$$ = this.service
      .list()
      .pipe(
        distinctUntilChanged(),
        map((response: ApiResponse | any) => response.collection)
      )
      .subscribe(data => {
        this.data$.next(data);
        this.paginator.length = data.length;
      });
  }

  unsubscribeData() {
    if (this.data$$ !== undefined) {
      this.data$$.unsubscribe();
    }
  }
  /**
   * Paginate the data (client-side). If you're using server-side pagination,
   * this would be replaced by requesting the appropriate data from the server.
   */
  private getPagedData(data: RoleListItem[]) {
    const startIndex = this.paginator.pageIndex * this.paginator.pageSize;
    return data.splice(startIndex, this.paginator.pageSize);
  }

  /**
   * Sort the data (client-side). If you're using server-side sorting,
   * this would be replaced by requesting the appropriate data from the server.
   */
  private getSortedData(data: RoleListItem[]) {
    if (!this.sort.active || this.sort.direction === "") {
      return data;
    }

    return data.sort((a, b) => {
      const isAsc = this.sort.direction === "asc";
      switch (this.sort.active) {
        case "name":
          return compare(a.name, b.name, isAsc);
        case "id":
          return compare(+a.id, +b.id, isAsc);
        default:
          return 0;
      }
    });
  }
}

/** Simple sort comparator for example ID/Name columns (for client-side sorting). */
function compare(a, b, isAsc) {
  return (a < b ? -1 : 1) * (isAsc ? 1 : -1);
}

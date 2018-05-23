export class ModelPagination {

  /**
   * Collection of data
   */
  collection: any[] = [];
  /**
   * Number of total pages
   */
  pages: number = 0;
  /**
   * Current page
   */
  current: number = 1;
  /**
   * Register per page
   */
  perpage: number = 5;
  /**
   * Total of collection
   */
  total: number = 0;

}

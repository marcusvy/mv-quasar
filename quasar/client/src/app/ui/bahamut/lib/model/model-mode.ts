export class ModelMode {
  deleteConfirm: boolean = false;
  delete: boolean = false;
  edit: boolean = false;
  form: boolean = false;
  list: boolean = false;
  search: boolean = false;

  constructor() { }

  enableDelete() {
    this.delete = true;
    return this;
  }

  disableDelete() {
    this.delete = false;
    return this;
  }

  enableDeleteConfirm() {
    this.deleteConfirm = true;
    return this;
  }

  disableDeleteConfirm() {
    this.deleteConfirm = false;
    return this;
  }

  enableEdit() {
    this.edit = true;
    return this;
  }

  disableEdit() {
    this.edit = false;
    return this;
  }

  enableForm() {
    this.form = true;
    return this;
  }

  disableForm() {
    this.form = false;
    return this;
  }

  enableSearch() {
    this.search = true;
    return this;
  }

  disableSearch() {
    this.search = false;
    return this;
  }
  enableList() {
    this.list = true;
    return this;
  }

  disableList() {
    this.list = false;
    return this;
  }
  reset() {
    this.delete = false;
    this.deleteConfirm = false;
    this.edit = false;
    this.form = false;
    this.list = false;
    this.search = false;
  }
}

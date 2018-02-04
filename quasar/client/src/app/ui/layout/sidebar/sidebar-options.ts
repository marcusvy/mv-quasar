export class SidebarOptions {
  private _title?: string;
  private _icon?: string;
  private _opened?: boolean = false;
  private _flex?: boolean = false;
  private _right?: boolean = false;
  private _backdrop?: boolean = false;
  private _enabled:boolean = true;
  private _toolbarClass;


  get title() { return this._title; }
  set title(value) { this._title = value; }
  setTitle(value) { this._title = value; return this; }

  get icon() { return this._icon; }
  set icon(value) { this._icon = value; }
  setIcon(value) { this._icon = value; return this; }

  get opened() { return this._opened; }
  set opened(value) { this._opened = value; }
  setOpened(value) { this._opened = value; return this; }

  get flex() { return this._flex; }
  set flex(value) { this._flex = value; }
  setFlex(value) { this._flex = value; return this; }

  get right() { return this._right; }
  set right(value) { this._right = value; }
  setRight(value) { this._right = value; return this; }

  get backdrop() { return this._backdrop; }
  set backdrop(value) { this._backdrop = value; }
  setBackdrop(value) { this._backdrop = value; return this; }

  get enabled() { return this._enabled; }
  set enabled(value) { this._enabled = value; }
  setEnabled(value) { this._enabled = value; return this; }

  get toolbarClass() { return this._toolbarClass; }
  set toolbarClass(value) { this._toolbarClass = value; }
  setToolbarClass(value) { this._toolbarClass = value; return this; }
}

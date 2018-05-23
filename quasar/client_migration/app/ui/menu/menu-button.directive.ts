import { Directive, Host, Optional } from '@angular/core';
import { MenuDropdownService } from './menu-dropdown/menu-dropdown.service';

@Directive({
  selector: 'button[mvMenuBtn]',
  host: {
    '(click)': 'open()',
    '(blur)': 'onBlur()'
  }
})
export class MenuButtonDirective {

  constructor( @Optional() @Host() private _service: MenuDropdownService) {}

  open() {
    this._service.open();
  }

  onBlur() {
    this._service.onBlur();
  }

}

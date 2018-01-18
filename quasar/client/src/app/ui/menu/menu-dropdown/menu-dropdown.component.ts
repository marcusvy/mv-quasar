import { Component, OnInit, OnDestroy } from '@angular/core';
import { MenuDropdownService } from './menu-dropdown.service';
import { MenuButtonDirective } from './../menu-button.directive';

import { Subscription } from 'rxjs/Subscription';

@Component({
  selector: 'mv-menu-dropdown',
  templateUrl: './menu-dropdown.component.html',
  styleUrls: [
    './menu-dropdown.component.scss',
    './menu-dropdown.theme.scss',
  ],
  providers: [
    MenuDropdownService
  ]
})
export class MenuDropdownComponent implements OnInit, OnDestroy {

  private $visible: Subscription;
  private _visible: Boolean = false;

  constructor(private _service: MenuDropdownService) { }

  ngOnInit() {
    this.$visible = this._service.visible
      .subscribe((isVisible) => {
        this._visible = isVisible;
      });
  }

  ngOnDestroy() {
    this.$visible.unsubscribe();
  }

  onMouseLeave() {
    // this._service.onBlur();
  }

  classMenuContainer() {
    let style = {
      'js-mv-menu--visible': this._visible
    };
    return style;
  }

}

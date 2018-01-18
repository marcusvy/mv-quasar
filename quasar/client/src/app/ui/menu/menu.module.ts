import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { GridModule } from './../grid/grid.module';
import { ButtonModule } from '../button/button.module';
import { IconModule } from '../icon/icon.module';

import { MenuComponent } from './menu.component';
import { MenuItemComponent } from './menu-item/menu-item.component';
import { MenuHeaderDirective } from './menu-header.directive';
import { MenuDivisorDirective } from './menu-divisor.directive';
import { MenuButtonDirective } from './menu-button.directive';
import { MenuDropdownComponent } from './menu-dropdown/menu-dropdown.component';
import { MenuItemSecondaryDirective } from './menu-item-secondary.directive';

@NgModule({
  imports: [
    CommonModule,
    GridModule,
    ButtonModule,
    IconModule,
  ],
  declarations: [
    MenuComponent,
    MenuItemComponent,
    MenuDivisorDirective,
    MenuHeaderDirective,
    MenuButtonDirective,
    MenuDropdownComponent,
    MenuItemSecondaryDirective,
  ],
  exports: [
    MenuComponent,
    MenuItemComponent,
    MenuDivisorDirective,
    MenuHeaderDirective,
    MenuButtonDirective,
    MenuDropdownComponent,
    MenuItemSecondaryDirective,
  ],
})
export class MenuModule { }

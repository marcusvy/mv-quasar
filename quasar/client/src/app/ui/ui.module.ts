import {ModuleWithProviders, NgModule, Optional, SkipSelf} from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { CommonModule } from '@angular/common';
import { HttpModule } from '@angular/http';
import { ReactiveFormsModule } from '@angular/forms';

/**
 * Core Module
 */
import { CoreModule } from './core/core.module';

/**
 * Config Module
 */
import { MvUiConfig } from './ui.config';

/**
 * Ui Modules
 */
import { AvatarModule } from './avatar/avatar.module';
import { BadgeModule } from './badge/badge.module';
import { BahamutModule } from './bahamut/bahamut.module';
import { ButtonModule } from './button/button.module';
import { CalendarModule } from './calendar/calendar.module';
import { CardModule } from './card/card.module';
import { FooterModule } from './footer/footer.module';
import { FormModule } from './form/form.module';
import { GridModule } from './grid/grid.module';
import { HeaderModule } from './header/header.module';
import { HeroModule } from './hero/hero.module';
import { IconModule } from './icon/icon.module';
import { LayoutModule } from './layout/layout.module';
import { ListModule } from './list/list.module';
import { LoadbarModule } from './loadbar/loadbar.module';
import { MenuModule } from './menu/menu.module';
import { ModalModule } from './modal/modal.module';
import { PaperModule } from './paper/paper.module';
import { ScrollerModule } from './scroller/scroller.module';
import { SectionModule } from './section/section.module';
import { ShellModule } from './shell/shell.module';
import { TabModule } from './tab/tab.module';
import { ToolbarModule } from './toolbar/toolbar.module';
import { UiComponent } from './ui.component';

/**
 * Ui component
 */

const listUiModules = [
  CoreModule,
  AvatarModule,
  BadgeModule,
  BahamutModule,
  ButtonModule,
  CardModule,
  CalendarModule,
  FooterModule,
  FormModule,
  GridModule,
  HeaderModule,
  HeroModule,
  IconModule,
  LayoutModule,
  ListModule,
  LoadbarModule,
  MenuModule,
  ModalModule,
  PaperModule,
  ScrollerModule,
  SectionModule,
  ShellModule,
  TabModule,
  ToolbarModule,
];

// const ui_config = new MvUiConfig();
// ui_config.configFont();

@NgModule({
  imports: [
    CommonModule,
    ReactiveFormsModule,
    ... listUiModules
  ],
  declarations: [
    UiComponent,
  ],
  exports: [
    UiComponent,
    ... listUiModules
  ]
})
export class MvUiModule {
  // constructor (@Optional() @SkipSelf() parentModule: MvUiModule) {
  //   if (parentModule) {
  //     throw new Error(
  //       'MvUiModule is already loaded. Import it in the AppModule only');
  //   }
  // }
  static forRoot(): ModuleWithProviders {
    return {
      ngModule: MvUiModule
    };
  }
}

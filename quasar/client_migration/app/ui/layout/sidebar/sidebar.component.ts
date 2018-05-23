import { Component, OnInit, Input, HostBinding } from '@angular/core';
import { SidebarOptions } from './sidebar-options';

@Component({
  selector: 'mv-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: [
    './sidebar.component.scss',
    './sidebar.theme.scss',
  ],
})
export class SidebarComponent implements OnInit {

  @Input() icon: string;
  @Input() title: string;
  @Input() backdrop;
  @Input() options: SidebarOptions = new SidebarOptions();
  @Input() enabled: boolean = true;

  isOpen = false;

  constructor() { }

  ngOnInit() {
    if(this.options !== undefined && this.options instanceof SidebarOptions){
      this.config(this.options);
    }
  }

  config(options: SidebarOptions) {
    this.backdrop = options.backdrop;
    this.icon = options.icon;
    this.title = options.title;
  }

  open() {
    this.isOpen = true;
  }

  close() {
    this.isOpen = false;

  }

  toggle() {
    this.isOpen = !this.isOpen;
  }

  hasBackdrop() {
    return !!(this.backdrop);
  }

  hasIcon() {
    return ((this.icon !== undefined) && (this.icon.length > 0));
  }
  hasTitle() {
    return ((this.title !== undefined) && (this.title.length > 0));
  }

  @HostBinding('class.is-open')
  get isOpened() {
    return this.isOpen;
  }

  @HostBinding('attr.opened')
  get attrOpened() {
    return (this.options.opened) ? '' : null;
  }

  @HostBinding('attr.flex')
  get attrFlex() {
    return (this.options.flex) ? '' : null;
  }

  @HostBinding('attr.right')
  get attrRight() {
    return (this.options.right) ?   '' : null;
  }

  @HostBinding('attr.backdrop')
  get attrBackdrop() {
    return (this.options.backdrop) ? '' : null;
  }

  @HostBinding('style.display')
  get enableSidebar() {
    return (this.options.enabled) ? null : 'none';
  }
}

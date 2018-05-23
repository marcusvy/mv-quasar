import {
  Component,
  OnInit,
  Input,
  Output,
  EventEmitter
} from '@angular/core';

@Component({
  selector: 'mv-menu-item',
  templateUrl: './menu-item.component.html',
  styleUrls: [
    './menu-item.component.scss',
    './menu-item.theme.scss',
  ]
})
export class MenuItemComponent implements OnInit {

  private hasLink: Boolean = false;

  @Input() href: string|null = null;
  @Input() icon: string;
  @Output() onMenuItemClick: EventEmitter<Boolean> = new EventEmitter<Boolean>();

  constructor() { }

  ngOnInit() {

  }

  public get hasIcon(){
    return (this.icon.length > 0);
  }

  onClick($event) {
    this.onMenuItemClick.emit(true);
  }
}

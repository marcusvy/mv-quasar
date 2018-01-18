import { Component, OnInit, Input, HostBinding, Output, EventEmitter } from '@angular/core';

import { MV_ANIMATION_TAB } from '../core/animation/tab.animation';

@Component({
  selector: 'mv-tab',
  templateUrl: './tab.component.html',
  styleUrls: ['./tab.component.scss'],
  animations: [MV_ANIMATION_TAB]
})
export class TabComponent implements OnInit {

  @Input() slug: string = '';
  @Input() icon: string;
  @Input() label: string = '';
  @Input() active: boolean = false;
  @Output() onSelect: EventEmitter<any> = new EventEmitter(true);

  @HostBinding('@tab')
  get tabAnimation() {
    return (this.active) ? 'active' : 'inactive';
  }

  constructor() { }

  ngOnInit() {
    if (this.slug.length === 0) {
      this.slug = this.label.toLowerCase();
    }
  }

}

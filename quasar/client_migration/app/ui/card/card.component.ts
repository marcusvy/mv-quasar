import {
  Component,
  OnInit,
  Input,
  HostBinding,
  ViewChild,
  ElementRef
} from '@angular/core';

@Component({
  selector: 'mv-card',
  templateUrl: './card.component.html',
  styleUrls: [
    './card.component.scss',
    './card.theme.scss'
  ],
})
export class CardComponent implements OnInit {

  @Input() img: string = '';
  @Input() titleColor: string = '';
  @Input() subtitleColor: string = '';

  @HostBinding('class.mv-shadow--default')
  @Input() shadow = true;

  constructor() { }

  ngOnInit() { }

  hasImg() {
    return {
      'has-img': (this.img.length > 0)
    }
  }

  getBackgroundImageHeader() {
    let backgroundImage: string = `url(${this.img})`;
    let style: Object = {};
    if (this.img.length > 0) {
      style = {
        'background-image': backgroundImage
      };
    }
    return style;
  }

}

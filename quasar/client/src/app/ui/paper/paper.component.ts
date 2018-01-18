import { Component, OnInit, Input, HostBinding } from '@angular/core';
import { PaperSizes } from './paper-sizes';

@Component({
  selector: 'mv-paper',
  templateUrl: './paper.component.html',
  styleUrls: [
    './paper.component.scss',
    './paper.theme.scss',
  ]
})
export class PaperComponent implements OnInit {

  @Input() size: string = 'A4';
  @Input() padding: number = 10;
  @Input() orientation: string | null = null;

  constructor() { }

  @HostBinding('class')
  get css() {
    let css = [];
    if (this.size !== null) {
      css.push(this.getPaperSize());
    }
    if (this.orientation !== null) {
      css.push(this.getPaperOrientation());
    }
    if (this.padding !== null) {
      css.push(this.getPaperPadding());
    }
    return css.join(' ');
  }

  ngOnInit() {
  }

  private getPaperSize() {
    return this.size.toUpperCase();
  }

  private getPaperOrientation() {
    return this.orientation.toLowerCase();
  }

  private getPaperPadding() {
    return 'padding-' + this.padding +'mm';
  }

  print() {
    print();
  }
}

import {
  Component,
  Inject,
  Input,
  OnInit,
  ViewEncapsulation,
  Renderer
} from '@angular/core';
import { DOCUMENT } from "@angular/platform-browser";
import { IconService } from "../icon.service";

@Component({
  selector: 'mv-iconset',
  template: '',
  encapsulation: ViewEncapsulation.None,
})
export class IconsetComponent implements OnInit {

  @Input() prefix: string;
  @Input() link: string;
  @Input() integrity: string = '';
  @Input() crossorigin: string = '';

  constructor(
    private service: IconService,
    @Inject(DOCUMENT) private document: any,
    private renderer: Renderer
  ) {}

  ngOnInit() {
    if (this.prefix !== undefined) {
      this.service.setPrefix(this.prefix);
    }
    if (this.link !== undefined) {
      this.registerLink(this.link);
    }
  }

  registerLink(link:string) {
    let h = this.document.getElementsByTagName("head")[0];
    let linkElement = this.renderer.createElement(h,'link');
    this.renderer.setElementAttribute(linkElement, 'rel', 'stylesheet');
    this.renderer.setElementAttribute(linkElement, 'href', this.link);
    if(this.integrity.length > 0) {
      this.renderer.setElementAttribute(linkElement, 'integrity', this.integrity);
    }
    if(this.crossorigin.length > 0) {
      this.renderer.setElementAttribute(linkElement, 'crossorigin', this.crossorigin);
    }
    this.renderer.invokeElementMethod(h,'appendChild',[linkElement]);
  }

}

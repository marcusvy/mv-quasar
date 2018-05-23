import { Component, OnInit, OnDestroy, Input, Output, EventEmitter, HostBinding, HostListener } from '@angular/core';
import { ModalAnimation, ModalBoxAnimation, ModalBackdropAnimation } from './modal.animation';

@Component({
  selector: 'mv-modal',
  templateUrl: './modal.component.html',
  styleUrls: [
    './modal.component.scss',
    './modal.theme.scss',
  ],
  animations: [
    ModalAnimation,
    ModalBoxAnimation,
    ModalBackdropAnimation
  ],
})
export class ModalComponent implements OnInit {

  @Input() title: string = '';
  @Input() backdrop: boolean = true;
  @Input() backdropClick: boolean = true;
  @Output() onClose: EventEmitter<any> = new EventEmitter();
  private visible: Boolean = false;
  private escKeyListener;

  constructor() { }

  ngOnInit() {}

  @HostBinding('@modalAnimation') get state() {
    return (this.visible) ? 'opened' : 'closed';
  };

  @HostBinding('attr.title')
  get attrTitle() {
    return null;
  }

  close() {
    this.visible = false;
    this.onClose.emit(true);
  }

  open() {
    this.visible = true;
  }

  onBackdropClick() {
    if (this.backdrop || this.backdropClick) {
      this.close();
    }
  }
}

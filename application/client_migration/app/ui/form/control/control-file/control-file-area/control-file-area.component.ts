import { Component, OnInit, EventEmitter, Output, Input } from '@angular/core';

@Component({
  selector: 'mv-control-file-area',
  templateUrl: './control-file-area.component.html',
  styleUrls: [
    './control-file-area.component.scss',
    './control-file-area.theme.scss',
  ],
})
export class ControlFileAreaComponent {

  @Input() files: File[];
  @Output() onDrag: EventEmitter<File[]> = new EventEmitter();
  @Output() onClick: EventEmitter<boolean> = new EventEmitter();

  constructor() { }

  onDragEvent(e: DragEvent) {
    e.stopPropagation();
    e.preventDefault();
  }

  onDropEvent(e: DragEvent) {
    e.stopPropagation();
    e.preventDefault();
    this.populateFiles(e.dataTransfer.files);
    this.onDrag.emit(this.files);
  }

  onAreaClick() {
    this.onClick.emit(true);
  }

  onRemove(file: File) {
    this.files.splice(this.files.indexOf(file), 1)
  }

  private populateFiles(files: FileList) {
    for (let $x = 0; $x < files.length; $x++) {
      this.files.push(files.item($x));
    }
  }
}

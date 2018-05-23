import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

import { MimeList } from '../../../../core/mime/mime-list';
import { MimeItem } from '../../../../core/mime/mime-item';

import { Observable } from 'rxjs/Observable';

@Component({
  selector: 'mv-control-file-item',
  templateUrl: './control-file-item.component.html',
  styleUrls: [
    './control-file-item.component.scss',
    './control-file-item.theme.scss',
  ]
})
export class ControlFileItemComponent implements OnInit {

  @Input() file: File;
  @Output() onRemove: EventEmitter<File> = new EventEmitter();

  mimeItem: MimeItem = {
    category: 'file',
    icon: 'file',
    mime: ['*']
  };
  src = '';
  icon = '';

  constructor() { }

  ngOnInit() {
    this.checkMimeMap();
    if (this.mimeItem.category === 'image') {
      this.getImageDataURL();
    }
  }

  private getImageDataURL() {
    const reader = new FileReader();
    reader.readAsDataURL(this.file);
    reader.onload = (e: ProgressEvent) => {
      let target: any = e.target;
      this.src = target.result;
    }
  }

  private checkMimeMap() {
    return MimeList.map(mimeItem => {
      mimeItem.mime.map(mime => {
        if (mime === this.file.type) {
          this.mimeItem = mimeItem;
          this.setupIcon(mimeItem);
        }
      })
    });
  }

  private setupIcon(mimeItem: MimeItem) {
    this.icon = mimeItem.icon
  }

  removeFile() {
    this.onRemove.emit(this.file);
  }

}

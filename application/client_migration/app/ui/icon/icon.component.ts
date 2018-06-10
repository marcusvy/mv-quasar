import { Component, Input, OnInit, OnDestroy } from '@angular/core';
import { IconService } from "./icon.service";
import { Subscription } from "rxjs/Rx";

@Component({
  selector: 'mv-icon',
  templateUrl: './icon.component.html',
  styleUrls: ['./icon.component.scss'],
})
export class IconComponent implements OnInit, OnDestroy {

  @Input() prefix: string;
  @Input() name: string;

  private prefixSubscription: Subscription;

  constructor(private service: IconService) { }

  ngOnInit() {
    if (this.prefix === undefined) {
      this.prefixSubscription = this.service.getPrefix()
        .subscribe((prefix) => {
          this.prefix = prefix;
        });
    }
  }

  ngOnDestroy() {
    this.prefixSubscription.unsubscribe();
  }

  ngClassIcon() {
    return [
      `${this.prefix}`,
      `${this.prefix}-${this.name}`,
    ];
  }
}

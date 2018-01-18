import { Directive, Input, OnInit, HostBinding } from '@angular/core';
import { AbstractControl } from '@angular/forms';

@Directive({
  selector: 'mv-control-value,[mvControlValue]'
})
export class ControlValueDirective implements OnInit {
  
  @Input('for') attrFor;
  public hidden = true;
  
  constructor() { }
  
  ngOnInit(): void { }

  @HostBinding('class.is-hidden')
  get isHidden(){
    return (this.attrFor!==undefined) ? this.hidden : false;
  }
}

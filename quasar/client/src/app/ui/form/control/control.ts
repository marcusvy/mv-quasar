import { AbstractControl } from '@angular/forms';
import { BehaviorSubject } from 'rxjs/BehaviorSubject';

export interface Control {
    registerControl(control:AbstractControl):void;
    registerValueChanges(subject: BehaviorSubject<any>);
    registerTouchChanges(subject: BehaviorSubject<any>);
    setupInitalValue():void;
}

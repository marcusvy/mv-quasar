import { Pipe, PipeTransform } from '@angular/core';
// import * as moment from 'moment';

@Pipe({
  name: 'mvMoment'
})
export class MvMomentPipe implements PipeTransform {

  transform(value: any, format?: string): any {
    if(!value) return;
    if(!window) return;
    if(!window.hasOwnProperty('moment')) {
      console.warn("Moment not loaded");
      return;
    }

    let jsDateString = '';
    if(value instanceof Object && value.hasOwnProperty('date')){
      if(/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}\.\d{6}$/.test(value.date)){
        jsDateString = value.date.replace(/(\.\d{6})$/,'');
      }else{
        jsDateString = value.date;
      }
    }else{
      jsDateString = value;
    }
    format = (format!== undefined) ? format : 'L LTS';
    return window['moment'](jsDateString).format(format);
  }

}

import { Pipe, PipeTransform } from '@angular/core';
import * as dfFormat from 'date-fns/format';

@Pipe({
  name: 'mvDate'
})
export class MvDatePipe implements PipeTransform {

  transform(value: Date | string | number | object, format?: string): any {

    let jsDateString: Date | string | number = '';
    if (value instanceof Object && value.hasOwnProperty('date')) {
      jsDateString = (/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}\.\d{6}$/.test(value['date']))
        ? value['date'].replace(/(\.\d{6})$/, '')
        : value['date'];
    } else {
      jsDateString = value as Date|string|number;
    }

    format = (format !== undefined) ? format : 'DD/MM/YYYY';
    return dfFormat(jsDateString, format);
  }

}

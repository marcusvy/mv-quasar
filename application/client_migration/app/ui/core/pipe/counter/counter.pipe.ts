import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'mvCounter'
})
export class MvCounterPipe implements PipeTransform {

  transform(value: string, unit:string = ''): any {
    let text = value;
    if (unit === 'word') {
      text = text.trim();
      // Splitting empty text returns a non-empty array
      return text.length > 0 ? text.split(/\s+/).length : 0;
    } else {
      return text.length;
    }
  }

}

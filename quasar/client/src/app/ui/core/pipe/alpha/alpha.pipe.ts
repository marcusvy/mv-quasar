import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'mvAlpha'
})
export class MvAlphaPipe implements PipeTransform {

  transform(value: any, args?: any): any {
    value = value.substr(0, value.length + 1)
      .replace(/[^a-zA-Z\s:\u00C0-\u00FF]/g, '');
    return value;
  }

}

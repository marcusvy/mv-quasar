import {Pipe, PipeTransform} from '@angular/core';

@Pipe({
  name: 'mvPhone'
})
export class MvPhonePipe implements PipeTransform {

  transform(value: string, args?: any): string {

    value = value.replace(/[^\d]/gi, '');

    if(value.length <= 8){
      value = value.replace(/(\d{4})(\d{1,4})/,'$1-$2');
    }
    if(value.length == 9){
      value = value.replace(/([9]?)(\d{4})(\d{1,4})/,'$1 $2-$3');
    }
    if(value.length <= 11){
      value = value.replace(/(\d{2})([9]?)(\d{4})(\d{4})/, '($1) $2 $3-$4');
    }

    switch (value.length) {
      case 13:
        value = value.replace(/(\d{2})(\d{2})([9]?)(\d{4})(\d{4})/gi, '+$1 ($2) $3 $4-$5');
        break;
      case 14:
        value = value.replace(/(\d{2})(\d{3})([9]?)(\d{4})(\d{4})/gi, '+$1 ($2) $3 $4-$5');
        break;
      default:
        return value;
    }

    return value;
  }

  /**
   * Parse value to database
   * @param value
   * @returns {string}
   */
  parse(value: string) {
    value = value
      .replace(/[^\d]+/g, '');
    return value;
  }

}

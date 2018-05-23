import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'mvBoleto'
})
export class MvBoletoPipe implements PipeTransform {

  transform(value: string, args?: any): string {
    value = value.replace(/[^\d]/gi,'')
      .replace(/(\d{5})(\d{5})(\d{5})(\d{6})(\d{5})(\d{6})(\d{1})(\d{14})/gi,'$1.$2 $3.$4 $5.$6 $7 $8');
    return value;
  }

}

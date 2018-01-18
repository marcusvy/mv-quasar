import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'mvCNPJ'
})
export class MvCnpjPipe implements PipeTransform {

  private length:number = 14;
  private maxlength:number = 18;

  transform(value: string, args?: any): string {

    value = value.substr(0, this.maxlength)
      .replace(/[^\d]+/g,'')
      // .replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/gi,'$1.$2.$3\/$4-$5');
      .replace(/^(\d{2})(\d)/,"$1.$2")
      .replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
      .replace(/\.(\d{3})(\d)/,".$1/$2")
      .replace(/(\d{4})(\d)/,"$1-$2");
    return value;
  }

  parse(value){
    value = value
      .replace(/[^\d]+/g,'')
      .substr(0, this.length);
    return value;
  }

}

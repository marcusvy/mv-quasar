import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'mvCEP'
})
export class MvCepPipe implements PipeTransform {

  private length:number = 8;
  private maxlength:number = 9;

  transform(value: string, args?: any): string {
    value = value.substr(0, this.maxlength)
      .replace(/[^\d]+/g,'')
      .replace(/(\d{5})(\d)/,'$1-$2');
    return value;
  }

  parse(value){
    value = value
      .replace(/[^\d]+/g,'')
      .substr(0,this.length);
    return value;
  }

}

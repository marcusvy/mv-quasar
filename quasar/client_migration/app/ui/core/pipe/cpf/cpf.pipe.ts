import {Pipe, PipeTransform} from '@angular/core';

@Pipe({
  name: 'mvCPF'
})
export class MvCpfPipe implements PipeTransform {

  private length: number = 11;
  private maxlength: number = 14;

  /**
   * Execute the mask
   * @param value
   * @param args
   * @returns {string}
   */
  transform(value: string, args?: any): string {
    value = value.substr(0, this.maxlength)
      .replace(/[^\d]+/g, '')
      .replace(/(\d{3})(\d)/, '$1.$2')
      .replace(/(\d{3})(\d)/, '$1.$2')
      .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    return value;
  }

  /**
   * Parse value to database
   * @param value
   * @returns {string}
   */
  parse(value: string) {
    value = value
      .replace(/[^\d]+/g, '')
      .substr(0, this.length);
    return value;
  }
}

import { Injectable } from '@angular/core';
import { InputMaskMoneyOptions } from './input-mask-money-options';
import { VMaskerStatic } from '../../core/vanilla-masker';

@Injectable()
export class InputMaskService {

  constructor() { }

  patterns = {}


  alpha(element: HTMLInputElement, VMasker: VMaskerStatic, pattern: string = ''): void {
    let value = element.value;
    value = value.substr(0, value.length + 1)
      .replace(/[^a-zA-Z\s:\u00C0-\u00FF]/g, '');
    element.value = value;
    // VMasker(element).maskPattern(pattern);
  }

  boleto(element: HTMLInputElement, VMasker: VMaskerStatic, pattern: string = '99999.99999 99999.999999 99999.999999 9 99999999999999'): void {
    VMasker(element).maskPattern(pattern);
  }

  cep(element: HTMLInputElement, VMasker: VMaskerStatic, pattern: string = '99999-999'): void {
    VMasker(element).maskPattern(pattern);
  }

  cnpj(element: HTMLInputElement, VMasker: VMaskerStatic, pattern: string = '99.999.999/9999-99'): void {
    VMasker(element).maskPattern(pattern);
  }

  cpf(element: HTMLInputElement, VMasker: VMaskerStatic, pattern: string = '999.999.999-99'): void {
    VMasker(element).maskPattern(pattern);
  }

  date(element: HTMLInputElement, VMasker: VMaskerStatic, pattern: string = '99/99/9999'): void {
    VMasker(element).maskPattern(pattern);
  }

  datetime(element: HTMLInputElement, VMasker: VMaskerStatic, pattern: string = '99/99/9999 99:99:99'): void {
    VMasker(element).maskPattern(pattern);
  }

  money(element: HTMLInputElement, VMasker: VMaskerStatic, options: InputMaskMoneyOptions): void {
    options = (options !== undefined) ? options : {
      precision: 2, separator: ',', delimiter: '.', unit: 'R$', suffixUnit: '', zeroCents: false
    };
    VMasker(element).maskMoney(options);
  }

  number(element: HTMLInputElement, VMasker: VMaskerStatic, pattern: string): void {
    VMasker(element).maskNumber();
  }

  phone(element: HTMLInputElement, VMasker: VMaskerStatic, pattern: string): void {
    let phonePattern = (element.value.replace(/\D/g, '').length > 10) ? '(99) 99999-9999' : '(99) 9999-9999';
    VMasker(element).maskPattern(phonePattern);
  }

  time(element: HTMLInputElement, VMasker: VMaskerStatic, pattern: string = '99:99:99'): void {
    VMasker(element).maskPattern(pattern);
  }
  // ipv4(element: HTMLInputElement, VMasker: VMaskerStatic, pattern: string = '099.099.099.099'): void {
  //   VMasker(element).maskPattern(pattern);
  // }
}

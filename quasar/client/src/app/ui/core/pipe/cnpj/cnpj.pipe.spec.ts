/* tslint:disable:no-unused-variable */

import { TestBed, async } from '@angular/core/testing';
import { CnpjPipe } from './cnpj.pipe';

describe('CnpjPipe', () => {
  const pipe = new CnpjPipe();

  it('create an instance', () => {
    expect(pipe).toBeTruthy();
  });

  it('cnpj mask', () => {
    let result = pipe.transform('00000000000000');
    expect(result).toBe('00.000.000\/0000-00');
  });

});

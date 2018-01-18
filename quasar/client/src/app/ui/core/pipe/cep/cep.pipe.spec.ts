/* tslint:disable:no-unused-variable */

import { TestBed, async } from '@angular/core/testing';
import { CepPipe } from './cep.pipe';

describe('CepPipe', () => {
  const pipe = new CepPipe();

  it('create an instance', () => {
    expect(pipe).toBeTruthy();
  });

  it('test boleto', () => {
    let result = pipe.transform('12345678');
    expect(result).toBe('12345-678');
  });
});

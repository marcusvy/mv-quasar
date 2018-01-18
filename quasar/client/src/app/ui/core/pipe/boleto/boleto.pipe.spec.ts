/* tslint:disable:no-unused-variable */

import { TestBed, async } from '@angular/core/testing';
import { BoletoPipe } from './boleto.pipe';

describe('BoletoPipe', () => {
  const pipe = new BoletoPipe();

  it('create an instance', () => {
    expect(pipe).toBeTruthy();
  });

  it('test boleto', () => {
    let result = pipe.transform('00000000000000000000000000000000000000000000000');
    expect(result).toBe('00000.00000 00000.000000 00000.000000 0 00000000000000');
  });

});

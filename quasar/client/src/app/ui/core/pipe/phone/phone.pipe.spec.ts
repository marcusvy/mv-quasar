/* tslint:disable:no-unused-variable */

import {TestBed, async} from '@angular/core/testing';
import {PhonePipe} from './phone.pipe';

describe('PhonePipe', () => {
  const pipe = new PhonePipe();

  it('create an instance', () => {
    expect(pipe).toBeTruthy();
  });

  it('8 digitos', () => {
    let result = pipe.transform('93456988');
    expect(result).toBe('9345-6988');
  });

  it('9 digitos', () => {
    let result = pipe.transform('993456988');
    expect(result).toBe('9 9345-6988');
  });

  it('11 digitos', () => {
    let result = pipe.transform('69993456988');
    expect(result).toBe('(69) 9 9345-6988');

  });

  it('13 digitos', () => {
    let result = pipe.transform('5569993456988');
    expect(result).toBe('+55 (69) 9 9345-6988');
  });

  it('14 digitos', () => {
    let result = pipe.transform('55069993456988');
    expect(result).toBe('+55 (069) 9 9345-6988');
  });
});

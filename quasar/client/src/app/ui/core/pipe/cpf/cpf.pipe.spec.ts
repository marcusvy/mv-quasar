/* tslint:disable:no-unused-variable */

import { TestBed, async } from '@angular/core/testing';
import { CpfPipe } from './cpf.pipe';

describe('CpfPipe', () => {
  it('create an instance', () => {
    let pipe = new CpfPipe();
    expect(pipe).toBeTruthy();
  });

  it('check transform', ()=> {
    let pipe = new CpfPipe();
    let result = pipe.transform('12345678901');
    expect(result).toBe('123.456.789-01');
  });
});

import { TestBed, inject } from '@angular/core/testing';

import { InputMaskService } from './input-mask.service';

describe('InputMaskService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [InputMaskService]
    });
  });

  it('should be created', inject([InputMaskService], (service: InputMaskService) => {
    expect(service).toBeTruthy();
  }));
});

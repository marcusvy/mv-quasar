import { TestBed, inject } from '@angular/core/testing';

import { LoadbarService } from './loadbar.service';

describe('LoadbarService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [LoadbarService]
    });
  });

  it('should be created', inject([LoadbarService], (service: LoadbarService) => {
    expect(service).toBeTruthy();
  }));
});

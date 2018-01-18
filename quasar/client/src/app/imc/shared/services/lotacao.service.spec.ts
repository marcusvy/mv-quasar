import { TestBed, inject } from '@angular/core/testing';

import { LotacaoService } from './lotacao.service';

describe('LotacaoService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [LotacaoService]
    });
  });

  it('should be created', inject([LotacaoService], (service: LotacaoService) => {
    expect(service).toBeTruthy();
  }));
});

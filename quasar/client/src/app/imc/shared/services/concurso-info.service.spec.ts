import { TestBed, inject } from '@angular/core/testing';

import { ConcursoInfoService } from './concurso-info.service';

describe('ConcursoInfoService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ConcursoInfoService]
    });
  });

  it('should be created', inject([ConcursoInfoService], (service: ConcursoInfoService) => {
    expect(service).toBeTruthy();
  }));
});

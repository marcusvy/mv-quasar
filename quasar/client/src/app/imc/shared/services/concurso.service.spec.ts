import { TestBed, inject } from '@angular/core/testing';

import { ConcursoService } from './concurso.service';

describe('ConcursoService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ConcursoService]
    });
  });

  it('should be created', inject([ConcursoService], (service: ConcursoService) => {
    expect(service).toBeTruthy();
  }));
});

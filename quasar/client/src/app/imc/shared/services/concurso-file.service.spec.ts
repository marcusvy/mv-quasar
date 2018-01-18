import { TestBed, inject } from '@angular/core/testing';

import { ConcursoFileService } from './concurso-file.service';

describe('ConcursoFileService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ConcursoFileService]
    });
  });

  it('should be created', inject([ConcursoFileService], (service: ConcursoFileService) => {
    expect(service).toBeTruthy();
  }));
});

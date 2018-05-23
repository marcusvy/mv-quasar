import { TestBed, inject } from '@angular/core/testing';

import { MicroareaService } from './microarea.service';

describe('MicroareaService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [MicroareaService]
    });
  });

  it('should be created', inject([MicroareaService], (service: MicroareaService) => {
    expect(service).toBeTruthy();
  }));
});

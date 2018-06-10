import { TestBed, inject } from '@angular/core/testing';

import { QuasarLogService } from './quasar-log.service';

describe('QuasarLogService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [QuasarLogService]
    });
  });

  it('should be created', inject([QuasarLogService], (service: QuasarLogService) => {
    expect(service).toBeTruthy();
  }));
});

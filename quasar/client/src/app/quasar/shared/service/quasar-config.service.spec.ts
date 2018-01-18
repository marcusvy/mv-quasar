import { TestBed, inject } from '@angular/core/testing';

import { QuasarConfigService } from './quasar-config.service';

describe('QuasarConfigService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [QuasarConfigService]
    });
  });

  it('should be created', inject([QuasarConfigService], (service: QuasarConfigService) => {
    expect(service).toBeTruthy();
  }));
});

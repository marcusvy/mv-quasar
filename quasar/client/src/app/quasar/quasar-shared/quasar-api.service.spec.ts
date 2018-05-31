import { TestBed, inject } from '@angular/core/testing';

import { QuasarApiService } from './quasar-api.service';

describe('QuasarApiService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [QuasarApiService]
    });
  });

  it('should be created', inject([QuasarApiService], (service: QuasarApiService) => {
    expect(service).toBeTruthy();
  }));
});

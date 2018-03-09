import { TestBed, inject } from '@angular/core/testing';

import { QuasarServerStatusService } from './quasar-server-status.service';

describe('QuasarServerStatusService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [QuasarServerStatusService]
    });
  });

  it('should be created', inject([QuasarServerStatusService], (service: QuasarServerStatusService) => {
    expect(service).toBeTruthy();
  }));
});

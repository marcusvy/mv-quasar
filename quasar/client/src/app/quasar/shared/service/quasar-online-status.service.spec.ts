import { TestBed, inject } from '@angular/core/testing';

import { QuasarOnlineStatusService } from './quasar-online-status.service';

describe('QuasarOnlineStatusService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [QuasarOnlineStatusService]
    });
  });

  it('should be created', inject([QuasarOnlineStatusService], (service: QuasarOnlineStatusService) => {
    expect(service).toBeTruthy();
  }));
});

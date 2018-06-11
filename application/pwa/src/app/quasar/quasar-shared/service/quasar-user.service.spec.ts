import { TestBed, inject } from '@angular/core/testing';

import { QuasarUserService } from './quasar-user.service';

describe('QuasarUserService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [QuasarUserService]
    });
  });

  it('should be created', inject([QuasarUserService], (service: QuasarUserService) => {
    expect(service).toBeTruthy();
  }));
});

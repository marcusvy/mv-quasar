import { TestBed, inject } from '@angular/core/testing';

import { BahamutService } from './bahamut.service';

describe('BahamutService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [BahamutService]
    });
  });

  it('should be created', inject([BahamutService], (service: BahamutService) => {
    expect(service).toBeTruthy();
  }));
});

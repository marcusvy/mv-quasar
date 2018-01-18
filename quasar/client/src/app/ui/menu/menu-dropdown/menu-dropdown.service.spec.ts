import { TestBed, inject } from '@angular/core/testing';

import { MenuDropdownService } from './menu-dropdown.service';

describe('MenuDropdownService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [MenuDropdownService]
    });
  });

  it('should be created', inject([MenuDropdownService], (service: MenuDropdownService) => {
    expect(service).toBeTruthy();
  }));
});

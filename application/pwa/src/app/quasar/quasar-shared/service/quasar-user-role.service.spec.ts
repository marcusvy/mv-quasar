import { TestBed, inject } from '@angular/core/testing';

import { QuasarUserRoleService } from './quasar-user-role.service';

describe('QuasarUserRoleService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [QuasarUserRoleService]
    });
  });

  it('should be created', inject([QuasarUserRoleService], (service: QuasarUserRoleService) => {
    expect(service).toBeTruthy();
  }));
});

import { TestBed, inject } from '@angular/core/testing';

import { QuasarApiDatasourceService } from './quasar-api-datasource.service';

describe('QuasarApiDatasourceService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [QuasarApiDatasourceService]
    });
  });

  it('should be created', inject([QuasarApiDatasourceService], (service: QuasarApiDatasourceService) => {
    expect(service).toBeTruthy();
  }));
});

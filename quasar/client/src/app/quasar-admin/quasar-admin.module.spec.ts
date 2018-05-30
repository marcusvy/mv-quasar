import { QuasarAdminModule } from './quasar-admin.module';

describe('QuasarAdminModule', () => {
  let quasarAdminModule: QuasarAdminModule;

  beforeEach(() => {
    quasarAdminModule = new QuasarAdminModule();
  });

  it('should create an instance', () => {
    expect(quasarAdminModule).toBeTruthy();
  });
});

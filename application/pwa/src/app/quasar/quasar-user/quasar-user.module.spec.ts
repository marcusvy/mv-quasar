import { QuasarUserModule } from './quasar-user.module';

describe('QuasarUserModule', () => {
  let quasarUserModule: QuasarUserModule;

  beforeEach(() => {
    quasarUserModule = new QuasarUserModule();
  });

  it('should create an instance', () => {
    expect(quasarUserModule).toBeTruthy();
  });
});

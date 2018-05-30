import { QuasarAuthModule } from './quasar-auth.module';

describe('QuasarAuthModule', () => {
  let quasarAuthModule: QuasarAuthModule;

  beforeEach(() => {
    quasarAuthModule = new QuasarAuthModule();
  });

  it('should create an instance', () => {
    expect(quasarAuthModule).toBeTruthy();
  });
});

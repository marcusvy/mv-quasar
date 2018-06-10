import { QuasarConfigModule } from './quasar-config.module';

describe('QuasarConfigModule', () => {
  let quasarConfigModule: QuasarConfigModule;

  beforeEach(() => {
    quasarConfigModule = new QuasarConfigModule();
  });

  it('should create an instance', () => {
    expect(quasarConfigModule).toBeTruthy();
  });
});

import { QuasarUiCoreModule } from './quasar-ui-core.module';

describe('QuasarUiCoreModule', () => {
  let quasarUiCoreModule: QuasarUiCoreModule;

  beforeEach(() => {
    quasarUiCoreModule = new QuasarUiCoreModule();
  });

  it('should create an instance', () => {
    expect(quasarUiCoreModule).toBeTruthy();
  });
});

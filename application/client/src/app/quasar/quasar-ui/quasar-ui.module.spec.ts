import { QuasarUiModule } from './quasar-ui.module';

describe('QuasarUiModule', () => {
  let quasarUiModule: QuasarUiModule;

  beforeEach(() => {
    quasarUiModule = new QuasarUiModule();
  });

  it('should create an instance', () => {
    expect(quasarUiModule).toBeTruthy();
  });
});

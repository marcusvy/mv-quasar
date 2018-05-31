import { QuasarUiLoadbarModule } from './quasar-ui-loadbar.module';

describe('QuasarUiLoadbarModule', () => {
  let quasarUiLoadbarModule: QuasarUiLoadbarModule;

  beforeEach(() => {
    quasarUiLoadbarModule = new QuasarUiLoadbarModule();
  });

  it('should create an instance', () => {
    expect(quasarUiLoadbarModule).toBeTruthy();
  });
});

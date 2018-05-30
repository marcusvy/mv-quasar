import { QuasarUiFooterModule } from './quasar-ui-footer.module';

describe('QuasarUiFooterModule', () => {
  let quasarUiFooterModule: QuasarUiFooterModule;

  beforeEach(() => {
    quasarUiFooterModule = new QuasarUiFooterModule();
  });

  it('should create an instance', () => {
    expect(quasarUiFooterModule).toBeTruthy();
  });
});

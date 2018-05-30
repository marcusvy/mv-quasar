import { QuasarUiGridModule } from './quasar-ui-grid.module';

describe('QuasarUiGridModule', () => {
  let quasarUiGridModule: QuasarUiGridModule;

  beforeEach(() => {
    quasarUiGridModule = new QuasarUiGridModule();
  });

  it('should create an instance', () => {
    expect(quasarUiGridModule).toBeTruthy();
  });
});

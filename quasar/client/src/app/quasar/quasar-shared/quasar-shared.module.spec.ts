import { QuasarSharedModule } from './quasar-shared.module';

describe('QuasarSharedModule', () => {
  let quasarSharedModule: QuasarSharedModule;

  beforeEach(() => {
    quasarSharedModule = new QuasarSharedModule();
  });

  it('should create an instance', () => {
    expect(quasarSharedModule).toBeTruthy();
  });
});

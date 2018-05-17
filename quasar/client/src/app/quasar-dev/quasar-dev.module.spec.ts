import { QuasarDevModule } from './quasar-dev.module';

describe('QuasarDevModule', () => {
  let quasarDevModule: QuasarDevModule;

  beforeEach(() => {
    quasarDevModule = new QuasarDevModule();
  });

  it('should create an instance', () => {
    expect(quasarDevModule).toBeTruthy();
  });
});

import { QuasarModule } from './quasar.module';

describe('QuasarModule', () => {
  let quasarModule: QuasarModule;

  beforeEach(() => {
    quasarModule = new QuasarModule();
  });

  it('should create an instance', () => {
    expect(quasarModule).toBeTruthy();
  });
});

import { QuasarUiHeroModule } from './quasar-ui-hero.module';

describe('QuasarUiHeroModule', () => {
  let quasarUiHeroModule: QuasarUiHeroModule;

  beforeEach(() => {
    quasarUiHeroModule = new QuasarUiHeroModule();
  });

  it('should create an instance', () => {
    expect(quasarUiHeroModule).toBeTruthy();
  });
});

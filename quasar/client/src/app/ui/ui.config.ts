/**
 * Vendor
 */
import * as WebFont from 'webfontloader';

export class MvUiConfig {

  constructor() {

  }

  /**
   * WebFont Configuration
   */
  configFont(families: string[] = ['Roboto:300,400']) {
    WebFont.load({
      google: {
        families: families
      }
    });
  }
}

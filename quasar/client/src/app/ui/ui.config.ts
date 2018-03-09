/**
 * Vendor
 */
import * as WebFont from 'webfontloader';

export class MvUiConfig {

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

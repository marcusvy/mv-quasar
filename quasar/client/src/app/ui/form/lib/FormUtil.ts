import {FormGroup, ValidationErrors} from '@angular/forms';

export class FormUtil {

  public static applyErrors(form: FormGroup, messages: ValidationErrors) {
    for (const control in messages) {
      if (form.contains(control)) {
        form.get(control).setErrors(messages[control]);
      }
    }
  }
}

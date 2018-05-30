import {FormGroup, ValidationErrors} from '@angular/forms';

export class FormErrorHydrator {

  public static hydrate(form: FormGroup, messages: ValidationErrors) {
    for (const control in messages) {
      if (form.contains(control)) {
        form.get(control).setErrors(messages[control]);
      }
    }
  }
}

import { Pipe, PipeTransform } from "@angular/core";

/**
 * Transform Quasar Server from errors and print the result
 * @example
 * <!-- Usuário -->
 *  <mat-form-field fxFlexFill>
 *    <input matInput formControlName="identity" placeholder="Usuário">
 *    <mat-error *ngIf="form.get('identity').invalid">{{form.get('identity').errors | quasarServerFormError}}</mat-error>
 *  </mat-form-field>
 */
@Pipe({
  pure:true,
  name: "quasarServerFormError"
})
export class QuasarServerFormErrorPipe implements PipeTransform {
  transform(value: string|Object, args?: any): any {
    let result = [];
    if (value !== undefined || value !== null) {
      let obj:Object = (typeof value == 'string') ? JSON.parse(value) : value;
      for (const error in obj) {
        if(typeof obj[error] !== "boolean")
        result.push(obj[error]);
      }
      // return result.join(';');
      return result[0];
    }
    return '';
  }
}

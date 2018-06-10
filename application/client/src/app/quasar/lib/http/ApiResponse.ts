import {ValidationErrors} from '@angular/forms';

export class ApiResponse {
  success?: boolean;
  collection?: any[];
  message?: string;
  form?: ValidationErrors | null;
  error?: any;
}

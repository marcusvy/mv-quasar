import {Pipe, PipeTransform} from '@angular/core';

@Pipe({
    name: 'formServerError'
})
export class FormServerErrorPipe implements PipeTransform {

    transform(value: any, args?: any): any {
        if(value !== undefined || value !== null) {
            console.log(value);
            return value[0];
        }
        return JSON.stringify(value);
    }

}

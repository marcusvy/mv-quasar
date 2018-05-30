import { Pipe, PipeTransform } from '@angular/core';
import { Observable, interval } from 'rxjs';

/**
 * {{message | quasarTypewriter| async}}
 */
// @todo Typewriter effect with Observable object

@Pipe({
  pure: true,
  name: 'quasarTypewriter'
})
export class QuasarTypewriterPipe implements PipeTransform {

  subject$:Observable<string>;

  transform(subject: string, args?: any): any {
    let duration = 2000;
    let repeat = false;
    if(args !== undefined && args!==null){
      duration = args[0] !== undefined || args[0] !== null ? args[0] : duration;
      repeat = args[1] !== undefined || args[1] !== null ? args[0] : repeat;
    }
    let time = duration / subject.length;
    let explode = subject.split("");
    let counter = 0;
    let cache = subject;

    // let animation = setInterval(() => {
    //   result = result.concat(subject.charAt(counter));
    //   counter++;
    //   if (result === subject && repeat) {
    //     result = '';
    //     counter = 0;
    //   }
    //   if (result === subject) {
    //     clearInterval(animation);
    //   }
    //   return result;
    // }, time);

    return subject;
  }

}

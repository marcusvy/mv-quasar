/*
 * Calendario Lib
 * @author Marcus Vinicius da Rocha Gouveia Cardoso <marcusvy@gmail.com>
 * @licence MIT
 */

export class CalendarioUtil {

  static millennium(date: Date): number {
    let alg = +date.getFullYear().toString().charAt(0);
    let exp = date.getFullYear().toString().length - 1;
    let base = 1 * Math.pow(10, exp);
    return alg * base;
  }

  static decade(date: Date): number {
    let millennium = CalendarioUtil.millennium(date);
    return Math.floor(((date.getFullYear() - millennium) / 10)) * 10;
  }

  static yearOfDecade(date: Date):number {
    let millennium = CalendarioUtil.millennium(date);
    let decade = CalendarioUtil.decade(date);
    return (date.getFullYear() - millennium) - decade;
  }

  static firstYearOfDecade(date: Date) {
    let yearOfDecade = CalendarioUtil.yearOfDecade(date);
    let firstYearOfDecade = (date.getFullYear() - yearOfDecade);
    return new Date(firstYearOfDecade, date.getMonth(), date.getDate());
  }

}

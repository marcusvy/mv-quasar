export class RandomIdGenerator {
  private _random:string;

  constructor(private base: string = '',
              private min: number = 1000,
              private max: number = 9999) {
    let id = this.generate(min, max);
    this._random = this.prepare(base, id);
  }

  get random() {
    return this._random;
  }

  generate(min: number, max: number): number {
    return Math.floor((Math.random() * max) + min);
  }

  prepare(base: string, id: number): any {
    return `${base}_${id}`;
  }
}

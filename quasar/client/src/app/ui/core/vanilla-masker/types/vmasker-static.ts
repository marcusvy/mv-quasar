import { VanillaMasker } from "./vanilla-masker";

export type VMaskerStatic = {
  (elements?: any): VanillaMasker;
  new(el?: any): VanillaMasker;
  toMoney(value: number, opts?: any): string;
  toNumber(value: any): number;
  toAlphaNumeric(value: any): string;
  toPattern(value: any, opts?: any): string;
}

export var VMasker: VMaskerStatic;

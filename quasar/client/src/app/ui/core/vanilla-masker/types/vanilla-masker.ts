export type VanillaMasker = {
  (elements?: any): VanillaMasker;
  maskMoney(options?: any): void;
  maskNumber(): void;
  maskAlphaNum(): void;
  maskPattern(pattern: any): void;
  unMask(): void;
  unbindElementToMask(): void;
  bindElementToMask(maskFunction: string): void;
}

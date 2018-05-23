import { VanillaMasker, VMaskerStatic } from "./../../core/vanilla-masker";
import { InputMaskMoneyOptions } from './input-mask-money-options';

export interface InputMaskHandler {
  (element: HTMLInputElement, vm: VanillaMasker | VMaskerStatic, pattern?: string | InputMaskMoneyOptions): void;
}

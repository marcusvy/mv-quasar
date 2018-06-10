import { QuasarMenuItem } from "./quasar-menu-item";

export interface QuasarMenu {
  header: string;
  children: QuasarMenuItem[];
  isOpen?: Boolean;
}

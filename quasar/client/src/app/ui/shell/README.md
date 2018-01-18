# Shell

Create a boilerplate for start layout application

## Use

```html
<mv-shell>
  <mv-shell-header>...</mv-shell-header>
  <mv-shell-left>...</mv-shell-left>
  <mv-shell-right>...</mv-shell-right>
  ...Content...
</mv-shell>
```

## Elements

- mv-shell-header: Header slot
- mv-shell-left: Left sidebar panel
- mv-shell-right: Right sidebar panel

## Configuration of Sidbars

```typescript
import { SidebarOptions } from '../ui/index';

export class QuasarComponent {
  
  leftSidebarOptions: SidebarOptions = new SidebarOptions();
  rightSidebarOptions: SidebarOptions = new SidebarOptions();

  constructor() {
    this.leftSidebarOptions
      .setTitle('Menu')
      .setIcon('bars')
      .setOpened(true)
      .setFlex(true);

    this.rightSidebarOptions
      .setTitle('Perfil')
      .setIcon('user-circle-o')
      .setRight(true)
      .setBackdrop(true);
  }
  
}
```

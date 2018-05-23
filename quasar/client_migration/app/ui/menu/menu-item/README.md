# Menu

A menu item for menu lists

# Usage

```html
<mv-menu>
  <mv-menu-item 
    icon="user" 
    href="htttps://mviniciusconsultoria.com.br"
    (onMenuItemClick)="callback($event)"> ... </mv-menu-item>
</mv-menu>
```

# Properties
- href: (string) : The url for http reference
- icon: (string) : A name of icon registered in **mv-icon**
- onMenuItemClick: (string) : Emit ```true``` after menu item click;

# Layout

Define layouts on the view and provide sidebar feature

```html
<mv-layout>
  <mv-sidebar #menuSidebar flex>
    Menu: Left sidebar with flex effect
  </mv-sidebar>

  <mv-sidebar #leftSidebar opened>
    Left: Sidebar aways opened on devices larger than mobile
  </mv-sidebar>

  <mv-sidebar #rightSidebar right backdrop>
    Right: Sidebar with backdrop
  </mv-sidebar>

  <!-- Any content -->
  <button class="mv-btn" accesskey="2" (click)="menuSidebar.toggle()">Menu</button>
  <button class="mv-btn" accesskey="3" (click)="leftSidebar.toggle()">Left</button>
  <button class="mv-btn" accesskey="4" (click)="rightSidebar.toggle()">Right</button>
  <!-- Any content -->
</mv-layout>
```

## Modifiers

- [chain], .is-chain: Sidebars are relatives to root layout component

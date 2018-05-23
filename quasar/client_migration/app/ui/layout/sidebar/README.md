# Sidebar

Define layouts on the view and provide sidebar feature

```html
<mv-sidebar #menuSidebar flex>
  Menu: Left sidebar with flex effect
</mv-sidebar>

<mv-sidebar #leftSidebar opened>
  Left: Sidebar aways opened on devices larger than mobile
</mv-sidebar>

<mv-sidebar #rightSidebar right backdrop>
  Right: Sidebar with backdrop
</mv-sidebar>
```

## Modifiers

- [flex]: Enable sidebar to flexible effect on layout.
- [opened]: Sidebar aways opened on devices larger than mobile
- [right]: Move sidebar to the right side
- [backdrop]: Enable backdrop feature, and transform the sidebar into a *secondary sidebar*.

## Secondary sidebars

For default, sidebars are relative to the content on layout. The **[backdrop]** attribute transform the sidebars to secondaries.
Backdrop is a layer to focus the user to opened sidebar. If you click, the sidebar close.

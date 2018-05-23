# Scroller

## Introduction
Scroller effect to add a **.is-scroller-on** or **.is-scroller-off** to a element; 

## Usage

```html
<mv-scroller>
  <div mvScroller>
    ...
  </div>
</mv-scroller>
```

You can personalize with advanced settings

```html
<mv-scroller [on="300"]>
  <div mvScroller class="the-element">
    ...
  </div>
</mv-scroller>
```

In the host component define de behavior of element **.the-element** 
```css
.the-element.is-scroller-on {
  
}
.the-element.is-scroller-off {
  position: fixed;
  z-index: 6000;
}
```

## Attributes
**@Input('on') shrinkOn: number|'*' = 300;**
The fixed height to check the limit offset. If is a number the height will be calculate in 'px'. If is a string '*', automaticaly calculate the height to prevent glicth on the screen when scroll;

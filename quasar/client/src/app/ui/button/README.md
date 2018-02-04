# Button

```html
<button mv-btn>
  ...
</button>
```

## Modifiers
- .is-active: Add active status
- .is-fullwidth: Button with 100% width
- .is-loading: Change status to loading

## Types

<table>
  <thead>
    <tr>
      <th>Type</th>
      <th>Modifier</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Disabled</td>
      <td>[disabled]</td>
      <td>Disabled button</td>
    </tr>
    <tr>
      <td>Raised</td>
      <td>.is-raised</td>
      <td>Raised button</td>
    </tr>
  </tbody>
</table>


## Button Top

The **top** directive enable a scroll button to top of the page

```html
<button mv-btn top>
  ...
</button>
```

## Properties

<table>
  <thead>
    <tr>
      <th>Property</th>
      <th>Type</th>
      <th>Default Value</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>scrollDistance</td>
      <td>number</td>
      <td>200</td>
      <td>Go top button will appear when user scrolls Y to this position</td>
    </tr>
    <tr>
      <td>animate</td>
      <td>boolean</td>
      <td>false</td>
      <td>If true scrolling to top will be animated</td>
    </tr>
    <tr>
      <td>speed</td>
      <td>number</td>
      <td>80</td>
      <td>Animated scrolling speed</td>
    </tr>
    <tr>
      <td>acceleration</td>
      <td>number</td>
      <td>0</td>
      <td>Acceleration coefficient, added to speed when using animated scroll</td>
    </tr>
    
  </tbody>
</table>


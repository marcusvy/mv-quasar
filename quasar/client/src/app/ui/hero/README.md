# mv-hero
------------------------

Modern display on page

# Usage

```html
<mv-hero img="img.png" opacity="" filter="">
  <h1> ... </h1>
  <h2> ... </h2>
  <p> ... </p>
  ...
  <button class="mv-btn">Do action</button>
</mv-hero>
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
      <td>img</td>
      <td>string</td>
      <td> - </td>
      <td>Source image for background image</td>
    </tr>
    <tr>
      <td>filter</td>
      <td>string</td>
      <td> - </td>
      <td>A color for a layer for make text more readable</td>
    </tr>
    <tr>
      <td>opacity</td>
      <td>number</td>
      <td> 1 </td>
      <td>Filter opacity</td>
    </tr>
    
  </tbody>
</table>


## Elements

* h1 : The first line of title
* h2 : The second line of title
* p : The paragraph
* button.mv-btn : The text


## Modifiers

Custom theme

- .is-theme-white
- .is-theme-black
- .is-theme-light
- .is-theme-dark
- .is-theme-primary
- .is-theme-secondary
- .is-theme-info
- .is-theme-success
- .is-theme-warning
- .is-theme-danger


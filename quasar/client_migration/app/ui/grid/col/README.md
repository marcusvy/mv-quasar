# Col

```html
<mv-grid>
  <mv-container>
    <mv-row>
      <mv-col> ... </mv-col>
      <mv-col> ... </mv-col>
      <mv-col> ... </mv-col>
    </mv-row>
    <mv-row>
      <mv-col>
        <mv-row>
          <mv-col> ... </mv-col>
          <mv-col> ... </mv-col>
        </mv-row>
      </mv-col>
    </mv-row>
  </mv-container>
</mv-grid>
```

## Modifiers

- .is-[device]: Reverse column order
- .no-grow: Remove auto size of column
- .is-[device]: Transform column to **flex**

## Devices

<table>
  <thead>
    <tr>
      <th>Device</th>
      <th>Size</th>
      <th>Default Value</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>mobile</td>
      <td>30rem</td>
      <td>480px</td>
      <td>Small devices</td>
    </tr>
    <tr>
      <td>tablet</td>
      <td>48rem</td>
      <td>768px</td>
      <td>Full HD Mobile devices and Tablet devices</td>
    </tr>
    <tr>
      <td>desktop</td>
      <td>60rem</td>
      <td>960px</td>
      <td>Desktop and Medium devices</td>
    </tr>
    <tr>
      <td>widescreen</td>
      <td>72rem</td>
      <td>1152px</td>
      <td>Widescreen devices</td>
    </tr>
    <tr>
      <td>fullhd</td>
      <td>84rem</td>
      <td>1344px</td>
      <td>Large screen devices: Retina display and TVs</td>
    </tr>
  </tbody>
</table>

## Responsive helpers

- .is-[device]-[1-12] : The col size
- .is-[device]-offset-0: Remove margin offset
- .is-[device]-offset-[1-12]: Add invisible columns before column

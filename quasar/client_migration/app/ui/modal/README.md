# Modal

```html
<mv-modal title"..." 
  (onClose)="callback($event)"
  [backdrop]="true" 
  [backdropClick]="true">
  <mv-modal-body> ... </mv-modal-body>
  <mv-modal-footer> ... </mv-modal-footer>
</mv-modal>
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
      <td>title</td>
      <td>string</td>
      <td>''</td>
      <td>Title of modal</td>
    </tr>
    <tr>
      <td>backdrop</td>
      <td>boolean</td>
      <td>true</td>
      <td>Remove backdrop</td>
    </tr>
    <tr>
      <td>backdropClick</td>
      <td>boolean</td>
      <td>true</td>
      <td>Remove close event on backdrop click</td>
    </tr>
    <tr>
      <td>onClose</td>
      <td>EventEmitter</td>
      <td>-</td>
      <td>Fire event after modal close</td>
    </tr>
  </tbody>
</table>

## Modifiers

- .is-flat: Remove modal body right and left paddings
- .is-relative: Make position relative a container.
- .is-small: 

# Control::Control File

## Sintaxe

```html
<mv-control formControlName="file">
  <mv-control-file mvControl>
    <mv-control-label>File</mv-control-label>
  </mv-control-file>
</mv-control>
````

## Detalhes

<table>
  <thead>
    <tr>
      <th>Propriedade</th>
      <th>Valor</th>
      <th>Descrição</th>
      <th>Obrigatório</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Elemento</td>
      <td>mv-control-file</td>
      <td></td>
      <td>Sim</td>
    </tr>
    <tr>
      <td>Diretiva assistiva</td>
      <td>mvControl</td>
      <td>Injeta controle</td>
      <td>Sim</td>
    </tr>
  </tbody>
</table>

## Attributes

```typescript
@Input() value = '';
@Input() type: string = 'text';
@Input() id: string = '';
@Input() multiple: boolean = false;
@Input() accept: string;
@Input() placeholder: string = '';
@Input() disabled = false;
@Input() required = false;
@Input() ariaDescribedby;
@Input() ariaLabelledby;
```

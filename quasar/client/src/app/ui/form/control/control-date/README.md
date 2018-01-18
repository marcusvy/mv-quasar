# Control Date

## Introduction

**ControlDate** component uses [Flatpickr][1]. 

## Sintaxe

```html
<mv-control formControlName="file">
  <mv-control-date mvControl>
    <mv-control-label>Date</mv-control-label>
  </mv-control-date>
</mv-control>
```

## Attributes

```typescript
@Input() value: any = '';
@Input() id: string = ''; 
@Input() placeholder: string = '';
@Input() disabled = false;
@Input() required = false;
@Input() class = null;
@Input() options: Flatpickr.Options = {};
```


See [List of Flatpickr Options][2]

[1]: https://chmln.github.io/flatpickr
[2]: https://chmln.github.io/flatpickr/options/

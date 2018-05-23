# Input Mask

## Introduction
Input mask use **VanillaMasker**, so check the [documentation of the project][1]. 

## Sintaxe

```html
<input mvInputMask[="name"] [mvInputMaskHandler]="myMaskFunction" />
```

## Built-in masks

Global

* alpha
* number
* phone
* date
* time
* datetime
* money
* percent

Pt-BR
* cep
* cpf
* cnpj
* boleto

## Exemplo

```html
<form [formGroup]="form" #formExample>
  <mv-control>
    <label>Personalizado</label>
    <input mvInputMask [mvInputMaskHandler]="myMaskFunction" name="telefone" formControlName="personalizado" />
  </mv-control>

  <mv-control>
    <label>Alpha </label>
    <input mvInputMask="alpha" name="alpha" formControlName="alpha" />
  </mv-control>
  
  <mv-control>
    <label>Number </label>
    <input mvInputMask="number" name="number" formControlName="number" />
  </mv-control>
  <mv-control>
    <label>Telefone </label>
    <input mvInputMask="phone" name="telefone" formControlName="telefone" />
  </mv-control>
  <mv-control>
    <label>Cep</label>
    <input mvInputMask="cep" name="cep" formControlName="cep" />
  </mv-control>
  <mv-control>
    <label>CPF</label>
    <input mvInputMask="cpf" name="cpf" formControlName="cpf" />
  </mv-control>
  <mv-control>
    <label>CNPJ</label>
    <input mvInputMask="cnpj" name="cnpj" formControlName="cnpj" />
  </mv-control>
  <mv-control>
    <label>Boleto</label>
    <input mvInputMask="boleto" name="boleto" formControlName="boleto" />
  </mv-control>
  <mv-control>
    <label>Date</label>
    <input mvInputMask="date" name="date" formControlName="date" />
  </mv-control>
  <mv-control>
    <label>Time</label>
    <input mvInputMask="time" name="time" formControlName="time" />
  </mv-control>
  <mv-control>
    <label>Datetime </label>
    <input mvInputMask="datetime" name="datetime" formControlName="datetime" />
  </mv-control>
  <mv-control>
    <label>Money</label>
    <input mvInputMask="money" name="money" formControlName="money" />
  </mv-control>
  <mv-control>
    <label>percent </label>
    <input mvInputMask="percent" name="percent" formControlName="percent" />
  </mv-control>
</form>
````

## Details

<table>
  <thead>
    <tr>
      <th>Value</th>
      <th>Description</th>
      <th>Required</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>mvInputMask</td>
      <td>Main directive</td>
      <td>Yes</td>
    </tr>
    <tr>
      <td>[mvInputMaskHandler]</td>
      <td>The custom function of inputmask that implements **InputMaskHandler** Interface</td>
      <td>Yes</td>
    </tr>
  </tbody>
</table>

## Attributes

```typescript
@Input() mvInputMask: string | InputMaskMoneyOptions = '';
@Input() mvInputMaskHandler: InputMaskHandler;
@Input() pattern: string;
```

## Custom handler

Add in attribute **mvInputMaskHandler** that implements the **InputMaskHandler** interface.

```typescript
myMaskFunction(el: HTMLInputElement, vm: VMaskerStatic, patern: string) {
  vm(el).maskPattern('9999 9999 9999 9999')
}
```

[1]: http://vanilla-masker.github.io/vanilla-masker/

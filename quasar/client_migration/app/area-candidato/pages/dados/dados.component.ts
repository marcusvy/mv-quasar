import { Subscription } from 'rxjs/Subscription';
import { Component, OnInit, OnDestroy } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { AuthService } from './../../../quasar-auth';
import { CandidatoService } from './../../../imc/shared/services/candidato.service';

@Component({
  selector: 'im-dados',
  templateUrl: './dados.component.html',
  styleUrls: ['./dados.component.scss']
})
export class DadosComponent implements OnInit, OnDestroy {

  form: FormGroup;
  $fetchSubscription: Subscription;
  $updatePerfilSubscription: Subscription;
  $updateSubscription: Subscription;

  constructor(private _fb: FormBuilder,
    private _service: AuthService,
    private _serviceC: CandidatoService) { }

  ngOnInit() {
    this.createForm();

    let storedAuthToken = this._service.decryptToken();
    let id = storedAuthToken[0];

    this.$fetchSubscription = this._serviceC.fetch(id)
      .retry(3)
      .subscribe(res => this.populateCandidatoData(res));
  }

  ngOnDestroy(): void {
    if (this.$fetchSubscription !== undefined) {
      this.$fetchSubscription.unsubscribe();
    }
    if (this.$updateSubscription !== undefined) {
      this.$updateSubscription.unsubscribe();
    }
    if (this.$updatePerfilSubscription !== undefined) {
      this.$updatePerfilSubscription.unsubscribe();
    }
  }

  createForm() {
    this.form = this._fb.group({
      cpf: [{ value: '', disabled: true }, Validators.compose([Validators.required])],
      nome: [{ value: '', disabled: true }, Validators.compose([Validators.required])],
      datanascimento: ['', Validators.compose([Validators.required])],
      // numfilhos: ['', Validators.compose([Validators.required])],
      nomemae: ['', Validators.compose([Validators.required])],
      nomepai: [''],
      tipodocumento: ['', Validators.compose([Validators.required])],
      numdocumento: ['', Validators.compose([Validators.required])],
      orgaodocumento: ['', Validators.compose([Validators.required])],
      ufdocumento: ['', Validators.compose([Validators.required])],
      dataemissaodocumento: ['', Validators.compose([Validators.required])],
      nacionalidade: ['', Validators.compose([Validators.required])],
      naturalidade: ['', Validators.compose([Validators.required])],
      sexo: ['', Validators.compose([Validators.required])],
      estadocivil: ['', Validators.compose([Validators.required])],
      nivelescolar: ['', Validators.compose([Validators.required])],
      cep: ['', Validators.compose([Validators.required])],
      tipologradouro: ['', Validators.compose([Validators.required])],
      endereco: ['', Validators.compose([Validators.required])],
      endereconumero: ['', Validators.compose([Validators.required])],
      enderecobairro: ['', Validators.compose([Validators.required])],
      enderecouf: ['', Validators.compose([Validators.required])],
      enderecomunicipio: ['', Validators.compose([Validators.required])],
      tel1: ['', Validators.compose([Validators.required])],
      tel2: [''], //Validators.compose([Validators.required])
      tel3: [''], //Validators.compose([Validators.required])
      email: [{ value: '', disabled: true }, Validators.compose([Validators.required, Validators.email])],
    });
  }

  populateCandidatoData(res) {
    let candidato = res['collection'][0];
    this.form.get('cpf').setValue(candidato.cpf);
    this.form.get('nome').setValue(candidato.nome);
    this.form.get('email').setValue(candidato.email);
  }

  updatePersonalData() {
    let storedAuthToken = this._service.decryptToken();
    let id = storedAuthToken[0];

    let perfil = {
      datanascimento: this.form.get('datanascimento').value,
      nomemae: this.form.get('nomemae').value,
      nomepai: this.form.get('nomepai').value,
      tipodocumento: this.form.get('tipodocumento').value,
      numdocumento: this.form.get('numdocumento').value,
      orgaodocumento: this.form.get('orgaodocumento').value,
      ufdocumento: this.form.get('ufdocumento').value,
      dataemissaodocumento: this.form.get('dataemissaodocumento').value,
      nacionalidade: this.form.get('nacionalidade').value,
      naturalidade: this.form.get('naturalidade').value,
      sexo: this.form.get('sexo').value,
      estadocivil: this.form.get('estadocivil').value,
      nivelescolar: this.form.get('nivelescolar').value,
      cep: this.form.get('cep').value,
      tipologradouro: this.form.get('tipologradouro').value,
      endereco: this.form.get('endereco').value,
      endereconumero: this.form.get('endereconumero').value,
      enderecobairro: this.form.get('enderecobairro').value,
      enderecouf: this.form.get('enderecouf').value,
      enderecomunicipio: this.form.get('enderecomunicipio').value,
      tel1: this.form.get('tel1').value,
      tel2: this.form.get('tel2').value,
      tel3: this.form.get('tel3').value,
    };

    this.$updatePerfilSubscription = this._serviceC.updatePerfil(perfil)
      .switchMap((res, index) => this._serviceC.update(id, res))
      .subscribe(res => {

      })
  }

  autoDigitar() {

    let data = {
      "datanascimento": "1995-07-13",
      "nomemae": "Maria Edna Rodrigues de Lima",
      "nomepai": "",
      "tipodocumento": "4",
      "numdocumento": "1251365",
      "orgaodocumento": "SSP",
      "ufdocumento": "RO",
      "dataemissaodocumento": "2011-04-21",
      "nacionalidade": "Brasileira",
      "naturalidade": "RO",
      "sexo": "M",
      "estadocivil": "S",
      "nivelescolar": "12",
      "cep": "76820186",
      "tipologradouro": "Rua",
      "endereco": "Vinte e Quatro de Julho",
      "endereconumero": "4237",
      "enderecobairro": "Nova Porto Velho",
      "enderecouf": "RO",
      "enderecomunicipio": "Porto Velho",
      "tel1": "(69) 3225-3183",
      "tel2": "",
      "tel3": ""
    };
    for (const field in data) {
      this.form.get(field).setValue(data[field]);
    }
  }




}


/**
 * {"datanascimento":"13/07/1995","nomemae":"Maria Edna Rodrigues de Lima","nomepai":"","tipodocumento":"4","numdocumento":"1251365","orgaodocumento":"SSP","ufdocumento":"RO","dataemissaodocumento":"21/04/2011","nacionalidade":"Brasileira","naturalidade":"RO","sexo":"M","estadocivil":"S","nivelescolar":"12","cep":"76820186","tipologradouro":"Rua","endereco":"Vinte e Quatro de Julho","endereconumero":"4237","enderecobairro":"Nova Porto Velho","enderecouf":"RO","enderecomunicipio":"Porto Velho","tel1":"(69) 3225-3183","tel2":"","tel3":""}
 */

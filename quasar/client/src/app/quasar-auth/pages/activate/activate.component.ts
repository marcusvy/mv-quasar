import { Subscription } from 'rxjs/Subscription';
import { Component, OnInit, OnDestroy } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { AuthService } from './../../shared/service/auth.service';

@Component({
  selector: 'im-activate',
  templateUrl: './activate.component.html',
  styleUrls: ['./activate.component.scss']
})
export class ActivateComponent implements OnInit, OnDestroy {


  success:boolean;
  message: string = '';
  $route: Subscription;
  $activation: Subscription;

  constructor(
    private _service: AuthService,
    private _route: ActivatedRoute,
    private _router: Router
  ) { }

  ngOnInit() {
    this.$route = this._route.params.subscribe(res => {
      this.activate(res['key']);
    }, (e) => {
      this.message = 'Chave inválida';
    });
  }

  ngOnDestroy(): void {
    if (this.$route !== undefined) {
      this.$route.unsubscribe();
    }
    if (this.$activation !== undefined) {
      this.$activation.unsubscribe();
    }
  }

  back() {
    this._router.navigate(['quasar', 'auth']);
  }

  activate(key) {
    this.message = '... Aguarde um momento. Verificando chave ...';
    this.$activation = this._service.activate(key)
      .subscribe((res) => {
        console.log('foi');
        this.success = res['success'];
        this.message = res['message'];
      }, () => {
        this.message = 'chave invalida';
      });
  }

}

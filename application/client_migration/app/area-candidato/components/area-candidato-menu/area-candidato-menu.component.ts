import { Component, OnInit } from '@angular/core';
import { AuthService } from './../../../quasar-auth';
import { Router } from '@angular/router';

@Component({
  selector: 'im-area-candidato-menu',
  templateUrl: './area-candidato-menu.component.html',
  styleUrls: ['./area-candidato-menu.component.scss']
})
export class AreaCandidatoMenuComponent implements OnInit {

  constructor(
    private _router: Router,
    private _service: AuthService
  ) { }

  ngOnInit() {
  }

  logout() {
    if (this._service.logout()) {
      this._router.navigate(['quasar', 'auth']);
    }
  }

}

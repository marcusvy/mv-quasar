import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from './../shared/service/auth.service';

@Component({
  selector: 'app-auth-profile-menu',
  templateUrl: './auth-profile-menu.component.html',
  styleUrls: ['./auth-profile-menu.component.scss']
})
export class AuthProfileMenuComponent implements OnInit {

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

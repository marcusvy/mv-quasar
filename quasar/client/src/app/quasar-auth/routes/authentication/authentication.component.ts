import { Component, OnInit, ViewChild, OnDestroy } from "@angular/core";
import { MatExpansionPanel, MatSnackBar } from "@angular/material";
import { Router } from "@angular/router";
import { Subscription } from "rxjs";
import { AuthService } from "../../auth.service";
import { QuasarAuthFormLoginComponent } from "../../quasar-auth-form-login/quasar-auth-form-login.component";
import { QuasarAuthFormSigninComponent } from "../../quasar-auth-form-signin/quasar-auth-form-signin.component";

@Component({
  selector: "mv-authentication",
  templateUrl: "./authentication.component.html",
  styleUrls: ["./authentication.component.scss"]
})
export class AuthenticationComponent implements OnInit, OnDestroy {
  @ViewChild("expansionPanelEntrar") epEntrar: MatExpansionPanel;
  @ViewChild(QuasarAuthFormLoginComponent)
  formLogin: QuasarAuthFormLoginComponent;
  @ViewChild(QuasarAuthFormSigninComponent)
  formSignin: QuasarAuthFormSigninComponent;
  private _login$$: Subscription;
  private _signin$$: Subscription;
  formErrors: any = {};

  constructor(
    private _service: AuthService,
    private _router: Router,
    public snackBar: MatSnackBar
  ) {}

  ngOnInit() {
    this.epEntrar.open();
  }

  ngOnDestroy(): void {
    if (this._login$$ !== undefined) {
      this._login$$.unsubscribe();
    }
    if (this._signin$$ !== undefined) {
      this._signin$$.unsubscribe();
    }
  }

  onLogin($event: { identity: string; credential: string }) {
    const formData = $event;
    this._login$$ = this._service
      .authenticate(formData.identity, formData.credential)
      .subscribe(res => {
        if (res["form"]) {
          this.formLogin.hydrateErrors(res["form"]);
        }
        if (res["success"]) {
          this.snackBar.open("Entrando..", "", { duration: 1000 });
          setTimeout(() => {
            this._router.navigateByUrl("/quasar");
          }, 2000);
        } else {
          this.snackBar.open("Usuário ou Senha inválidos", "", {
            duration: 3000
          });
        }
      });
  }

  onSignin($event) {
    const formData = $event;

    this._signin$$ = this._service.signin(formData).subscribe(
      res => {
        if (res["form"]) {
          this.formSignin.hydrateErrors(res["form"]);
        }
        // FormUtil.applyErrors(this.form, res['form']);
        if (res["success"]) {
          this.epEntrar.accordion.closeAll();
          this.epEntrar.open();
          this.formSignin.form.reset();
        }
        if (res["message"] !== undefined) {
          this.snackBar.open(res["message"], "", { duration: 10000 });
        }
      },
      err => {
        // this.message = "Erro ao enviar";
      },
      () => {
        // this.loading = false;
      }
    );
  }
}

import { Component, OnInit } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";

@Component({
  selector: "mv-mail",
  templateUrl: "./mail.component.html",
  styleUrls: ["./mail.component.scss"]
})
export class MailComponent implements OnInit {
  form: FormGroup;

  constructor(private _fb: FormBuilder) {}

  ngOnInit() {
    this.createForm();
  }

  createForm() {
    this.form = this._fb.group({
      mail: ["dev@mviniciusconsultoria.com.br", Validators.required]
    });
  }
}

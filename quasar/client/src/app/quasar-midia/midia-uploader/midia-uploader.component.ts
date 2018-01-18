import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-midia-uploader',
  templateUrl: './midia-uploader.component.html',
  styleUrls: ['./midia-uploader.component.scss']
})
export class MidiaUploaderComponent implements OnInit {

  formUpload:FormGroup;
  constructor(private _fb:FormBuilder) { }

  ngOnInit() {
    this.formUpload = this._fb.group({
      midia: ['', Validators.compose([Validators.required])]
    })
  }

}

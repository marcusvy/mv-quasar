import { Component, OnInit, OnDestroy } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { QuasarConfigService } from '../../quasar/shared/service/quasar-config.service';
import { HttpClient } from '@angular/common/http';
import { Subscription } from 'rxjs/Subscription';

@Component({
  selector: 'app-midia-uploader',
  templateUrl: './midia-uploader.component.html',
  styleUrls: ['./midia-uploader.component.scss']
})
export class MidiaUploaderComponent implements OnInit, OnDestroy {

  private uploadSubscription: Subscription;
  formFile: FormGroup;
  formDetail: FormGroup;
  canUpload = false;


  constructor(
    private _fb: FormBuilder,
    private _quasarConfigService: QuasarConfigService,
    private _http: HttpClient
  ) { }

  ngOnInit() {
    this.createForm();
  }

  ngOnDestroy() {
    if (this.uploadSubscription !== undefined) {
      this.uploadSubscription.unsubscribe();
    }
  }


  createForm() {
    this.formFile = this._fb.group({
      midia: ['', Validators.compose([Validators.required])]
    });
    this.formDetail = this._fb.group({
      title: ['', Validators.compose([Validators.required])],
      description: [''],
    });
  }

  upload($event) {
    if (this.formFile.valid) {
      this.readFile(this.formFile.get('midia').value);
    }
  }

  readFile(files: File[]) {
    files.map((file, index) => {
      // let reader = new FileReader();
      // reader.readAsDataURL(file);

      // reader.addEventListener('error', (e: ErrorEvent) => {
      //   this.canUpload = false;
      //   console.log(e);
      // });

      // reader.addEventListener('load', (e: ProgressEvent) => {
      //   let target: any = e.target;
      //   if (this.formDetail.get('title').value == "") {
      //     this.formDetail.get('title').setValue(file.name);
      //   }
      //   let body = Object.assign(
      //     { detail: this.formDetail.value },
      //     {
      //       file: {
      //         size: file.size,
      //         type: file.type,
      //       }
      //     },
      //     {
      //       dataURL: target.result
      //     }
      //   );
      //   this.canUpload = true;
      //   this.sendFile(body);
      // });
      // return file;

      let data = new FormData()
      data.append('title', this.formDetail.get('title').value == '' ? file.name : this.formDetail.get('title').value);
      data.append('description', this.formDetail.get('description').value);
      data.append('size', file.size.toString());
      data.append('type', file.type);
      data.append('file',file,file.name);
      this.sendFile(data);
    });

  }

  sendFile(body) {
    let url = this._quasarConfigService.api.midia.children.image.default;
    this._http.post(url, body)
      .subscribe(res => {
        console.log(res);
      });
  }
}

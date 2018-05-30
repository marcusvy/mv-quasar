import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarAuthFormSigninComponent } from './quasar-auth-form-signin.component';

describe('QuasarAuthFormSigninComponent', () => {
  let component: QuasarAuthFormSigninComponent;
  let fixture: ComponentFixture<QuasarAuthFormSigninComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarAuthFormSigninComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarAuthFormSigninComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

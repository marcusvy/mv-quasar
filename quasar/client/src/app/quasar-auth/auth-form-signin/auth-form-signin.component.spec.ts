import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AuthFormSigninComponent } from './auth-form-signin.component';

describe('AuthFormSigninComponent', () => {
  let component: AuthFormSigninComponent;
  let fixture: ComponentFixture<AuthFormSigninComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AuthFormSigninComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AuthFormSigninComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

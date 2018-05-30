import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarAuthFormLoginComponent } from './quasar-auth-form-login.component';

describe('QuasarAuthFormLoginComponent', () => {
  let component: QuasarAuthFormLoginComponent;
  let fixture: ComponentFixture<QuasarAuthFormLoginComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarAuthFormLoginComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarAuthFormLoginComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

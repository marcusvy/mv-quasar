import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarAuthFormActivationComponent } from './quasar-auth-form-activation.component';

describe('QuasarAuthFormActivationComponent', () => {
  let component: QuasarAuthFormActivationComponent;
  let fixture: ComponentFixture<QuasarAuthFormActivationComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarAuthFormActivationComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarAuthFormActivationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

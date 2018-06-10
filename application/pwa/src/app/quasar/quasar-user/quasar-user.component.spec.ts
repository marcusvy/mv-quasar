import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarUserComponent } from './quasar-user.component';

describe('QuasarUserComponent', () => {
  let component: QuasarUserComponent;
  let fixture: ComponentFixture<QuasarUserComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarUserComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarUserComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

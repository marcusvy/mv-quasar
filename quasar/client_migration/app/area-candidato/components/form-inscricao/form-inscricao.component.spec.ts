import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FormInscricaoComponent } from './form-inscricao.component';

describe('FormInscricaoComponent', () => {
  let component: FormInscricaoComponent;
  let fixture: ComponentFixture<FormInscricaoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FormInscricaoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FormInscricaoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarComponent } from './quasar.component';

describe('QuasarComponent', () => {
  let component: QuasarComponent;
  let fixture: ComponentFixture<QuasarComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

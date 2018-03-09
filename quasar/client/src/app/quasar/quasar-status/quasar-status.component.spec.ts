import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarStatusComponent } from './quasar-status.component';

describe('QuasarStatusComponent', () => {
  let component: QuasarStatusComponent;
  let fixture: ComponentFixture<QuasarStatusComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarStatusComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarStatusComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

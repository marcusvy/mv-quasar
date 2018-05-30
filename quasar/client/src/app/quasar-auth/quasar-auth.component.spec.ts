import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarAuthComponent } from './quasar-auth.component';

describe('QuasarAuthComponent', () => {
  let component: QuasarAuthComponent;
  let fixture: ComponentFixture<QuasarAuthComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarAuthComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarAuthComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

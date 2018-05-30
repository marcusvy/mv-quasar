import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarErrorPageComponent } from './quasar-error-page.component';

describe('QuasarErrorPageComponent', () => {
  let component: QuasarErrorPageComponent;
  let fixture: ComponentFixture<QuasarErrorPageComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarErrorPageComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarErrorPageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

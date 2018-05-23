import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarAboutComponent } from './quasar-about.component';

describe('QuasarAboutComponent', () => {
  let component: QuasarAboutComponent;
  let fixture: ComponentFixture<QuasarAboutComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarAboutComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarAboutComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

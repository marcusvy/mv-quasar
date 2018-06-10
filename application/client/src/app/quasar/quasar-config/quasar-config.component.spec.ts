import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarConfigComponent } from './quasar-config.component';

describe('QuasarConfigComponent', () => {
  let component: QuasarConfigComponent;
  let fixture: ComponentFixture<QuasarConfigComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarConfigComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarConfigComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

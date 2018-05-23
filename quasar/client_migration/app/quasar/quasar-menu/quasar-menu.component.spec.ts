import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarMenuComponent } from './quasar-menu.component';

describe('QuasarMenuComponent', () => {
  let component: QuasarMenuComponent;
  let fixture: ComponentFixture<QuasarMenuComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarMenuComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarMenuComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

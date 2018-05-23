import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarShellComponent } from './quasar-shell.component';

describe('QuasarShellComponent', () => {
  let component: QuasarShellComponent;
  let fixture: ComponentFixture<QuasarShellComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarShellComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarShellComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

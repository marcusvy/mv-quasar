import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ControlToggleComponent } from './control-toggle.component';

describe('ControlToggleComponent', () => {
  let component: ControlToggleComponent;
  let fixture: ComponentFixture<ControlToggleComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ControlToggleComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ControlToggleComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});

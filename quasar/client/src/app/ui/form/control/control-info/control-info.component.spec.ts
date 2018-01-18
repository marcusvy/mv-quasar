import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ControlInfoComponent } from './control-info.component';

describe('ControlInfoComponent', () => {
  let component: ControlInfoComponent;
  let fixture: ComponentFixture<ControlInfoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ControlInfoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ControlInfoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});

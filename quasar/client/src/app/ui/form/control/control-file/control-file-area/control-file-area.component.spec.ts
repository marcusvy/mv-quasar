import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ControlFileAreaComponent } from './control-file-area.component';

describe('ControlFileAreaComponent', () => {
  let component: ControlFileAreaComponent;
  let fixture: ComponentFixture<ControlFileAreaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ControlFileAreaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ControlFileAreaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});

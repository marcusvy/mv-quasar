import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ControlFileComponent } from './control-file.component';

describe('ControlFileComponent', () => {
  let component: ControlFileComponent;
  let fixture: ComponentFixture<ControlFileComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ControlFileComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ControlFileComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});

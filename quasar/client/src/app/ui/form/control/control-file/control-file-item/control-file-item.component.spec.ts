import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ControlFileItemComponent } from './control-file-item.component';

describe('ControlFileItemComponent', () => {
  let component: ControlFileItemComponent;
  let fixture: ComponentFixture<ControlFileItemComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ControlFileItemComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ControlFileItemComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});

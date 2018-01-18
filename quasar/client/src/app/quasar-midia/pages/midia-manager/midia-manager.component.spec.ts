import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MidiaManagerComponent } from './midia-manager.component';

describe('MidiaManagerComponent', () => {
  let component: MidiaManagerComponent;
  let fixture: ComponentFixture<MidiaManagerComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MidiaManagerComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MidiaManagerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

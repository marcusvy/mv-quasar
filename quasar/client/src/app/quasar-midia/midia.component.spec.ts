import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MidiaComponent } from './midia.component';

describe('MidiaComponent', () => {
  let component: MidiaComponent;
  let fixture: ComponentFixture<MidiaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MidiaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MidiaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

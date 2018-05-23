import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MidiaDashboardComponent } from './midia-dashboard.component';

describe('MidiaDashboardComponent', () => {
  let component: MidiaDashboardComponent;
  let fixture: ComponentFixture<MidiaDashboardComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MidiaDashboardComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MidiaDashboardComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

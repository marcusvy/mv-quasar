import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MidiaStatsComponent } from './midia-stats.component';

describe('MidiaStatsComponent', () => {
  let component: MidiaStatsComponent;
  let fixture: ComponentFixture<MidiaStatsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MidiaStatsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MidiaStatsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

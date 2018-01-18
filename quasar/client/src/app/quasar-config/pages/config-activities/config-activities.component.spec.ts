import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConfigActivitiesComponent } from './config-activities.component';

describe('ConfigActivitiesComponent', () => {
  let component: ConfigActivitiesComponent;
  let fixture: ComponentFixture<ConfigActivitiesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConfigActivitiesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConfigActivitiesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

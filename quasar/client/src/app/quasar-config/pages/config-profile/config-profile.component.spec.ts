import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConfigProfileComponent } from './config-profile.component';

describe('ConfigProfileComponent', () => {
  let component: ConfigProfileComponent;
  let fixture: ComponentFixture<ConfigProfileComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConfigProfileComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConfigProfileComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

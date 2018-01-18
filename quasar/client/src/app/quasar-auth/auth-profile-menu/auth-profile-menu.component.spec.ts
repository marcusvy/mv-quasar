import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AuthProfileMenuComponent } from './auth-profile-menu.component';

describe('AuthProfileMenuComponent', () => {
  let component: AuthProfileMenuComponent;
  let fixture: ComponentFixture<AuthProfileMenuComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AuthProfileMenuComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AuthProfileMenuComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

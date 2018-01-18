import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { LoadbarComponent } from './loadbar.component';

describe('LoadbarComponent', () => {
  let component: LoadbarComponent;
  let fixture: ComponentFixture<LoadbarComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ LoadbarComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(LoadbarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});

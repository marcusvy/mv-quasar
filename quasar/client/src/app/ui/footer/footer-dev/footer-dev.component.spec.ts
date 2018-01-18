import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FooterDevComponent } from './footer-dev.component';

describe('FooterDevComponent', () => {
  let component: FooterDevComponent;
  let fixture: ComponentFixture<FooterDevComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FooterDevComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FooterDevComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});

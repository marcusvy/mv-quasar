import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BahamutComponent } from './bahamut.component';

describe('BahamutComponent', () => {
  let component: BahamutComponent;
  let fixture: ComponentFixture<BahamutComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BahamutComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BahamutComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

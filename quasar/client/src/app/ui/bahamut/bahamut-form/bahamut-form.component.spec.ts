import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BahamutFormComponent } from './bahamut-form.component';

describe('BahamutFormComponent', () => {
  let component: BahamutFormComponent;
  let fixture: ComponentFixture<BahamutFormComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BahamutFormComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BahamutFormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

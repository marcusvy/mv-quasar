import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BahamutCollectionControlComponent } from './bahamut-collection-control.component';

describe('BahamutCollectionControlComponent', () => {
  let component: BahamutCollectionControlComponent;
  let fixture: ComponentFixture<BahamutCollectionControlComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BahamutCollectionControlComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BahamutCollectionControlComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

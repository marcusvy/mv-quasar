import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BahamutCollectionComponent } from './bahamut-collection.component';

describe('BahamutCollectionComponent', () => {
  let component: BahamutCollectionComponent;
  let fixture: ComponentFixture<BahamutCollectionComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BahamutCollectionComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BahamutCollectionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

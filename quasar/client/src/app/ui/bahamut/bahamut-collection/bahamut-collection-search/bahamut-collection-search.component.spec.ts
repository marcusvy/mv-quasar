import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BahamutCollectionSearchComponent } from './bahamut-collection-search.component';

describe('BahamutCollectionSearchComponent', () => {
  let component: BahamutCollectionSearchComponent;
  let fixture: ComponentFixture<BahamutCollectionSearchComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BahamutCollectionSearchComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BahamutCollectionSearchComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

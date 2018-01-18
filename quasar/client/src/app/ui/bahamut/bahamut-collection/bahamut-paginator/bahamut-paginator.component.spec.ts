import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BahamutPaginatorComponent } from './bahamut-paginator.component';

describe('BahamutPaginatorComponent', () => {
  let component: BahamutPaginatorComponent;
  let fixture: ComponentFixture<BahamutPaginatorComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BahamutPaginatorComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BahamutPaginatorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

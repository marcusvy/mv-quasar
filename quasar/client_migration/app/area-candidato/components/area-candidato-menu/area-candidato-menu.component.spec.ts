import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AreaCandidatoMenuComponent } from './area-candidato-menu.component';

describe('AreaCandidatoMenuComponent', () => {
  let component: AreaCandidatoMenuComponent;
  let fixture: ComponentFixture<AreaCandidatoMenuComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AreaCandidatoMenuComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AreaCandidatoMenuComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

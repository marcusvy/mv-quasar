import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AreaCandidatoComponent } from './area-candidato.component';

describe('AreaCandidatoComponent', () => {
  let component: AreaCandidatoComponent;
  let fixture: ComponentFixture<AreaCandidatoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AreaCandidatoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AreaCandidatoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

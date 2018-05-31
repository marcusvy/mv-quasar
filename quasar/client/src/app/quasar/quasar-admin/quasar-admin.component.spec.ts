import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarAdminComponent } from './quasar-admin.component';

describe('QuasarAdminComponent', () => {
  let component: QuasarAdminComponent;
  let fixture: ComponentFixture<QuasarAdminComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarAdminComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarAdminComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

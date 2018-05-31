import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarOfflineComponent } from './quasar-offline.component';

describe('QuasarOfflineComponent', () => {
  let component: QuasarOfflineComponent;
  let fixture: ComponentFixture<QuasarOfflineComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarOfflineComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarOfflineComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

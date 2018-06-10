
import { fakeAsync, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarConfigLogListComponent } from './quasar-config-log-list.component';

describe('QuasarConfigLogListComponent', () => {
  let component: QuasarConfigLogListComponent;
  let fixture: ComponentFixture<QuasarConfigLogListComponent>;

  beforeEach(fakeAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarConfigLogListComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(QuasarConfigLogListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should compile', () => {
    expect(component).toBeTruthy();
  });
});

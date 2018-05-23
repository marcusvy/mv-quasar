
import { fakeAsync, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarDashboardComponent } from './quasar-dashboard.component';
import { QuasarSharedModule } from '../quasar-shared.module';
import { MatGridListModule, MatCardModule, MatButtonModule, MatMenuModule, MatIconModule, MatSidenavModule } from '@angular/material';

describe('QuasarDashboardComponent', () => {
  let component: QuasarDashboardComponent;
  let fixture: ComponentFixture<QuasarDashboardComponent>;

  beforeEach(fakeAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarDashboardComponent ],
      imports:[
        MatGridListModule,
        MatCardModule,
        MatButtonModule,
        MatMenuModule,
        MatIconModule,
        MatSidenavModule
      ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(QuasarDashboardComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should compile', () => {
    expect(component).toBeTruthy();
  });
});

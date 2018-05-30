import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarMenuComponent } from './quasar-menu.component';
import { MatExpansionModule, MatListModule } from '@angular/material';
import { QuasarRoutingModule } from '../../quasar.routing';
import { RouterTestingModule } from '@angular/router/testing';
import { QUASAR_ROUTES } from './../../quasar.routing';

describe('QuasarMenuComponent', () => {
  let component: QuasarMenuComponent;
  let fixture: ComponentFixture<QuasarMenuComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [QuasarMenuComponent],
      imports: [
        MatExpansionModule,
        MatListModule,
        QuasarRoutingModule,
        RouterTestingModule.withRoutes(QUASAR_ROUTES),
      ]
    })
      .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarMenuComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

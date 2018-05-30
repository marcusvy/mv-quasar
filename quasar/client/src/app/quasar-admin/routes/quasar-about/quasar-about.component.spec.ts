import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuasarAboutComponent } from './quasar-about.component';
import { QuasarRoutingModule } from '../../quasar.routing';
import { MatListModule } from '@angular/material';

describe('QuasarAboutComponent', () => {
  let component: QuasarAboutComponent;
  let fixture: ComponentFixture<QuasarAboutComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuasarAboutComponent ],
      imports:[
        QuasarRoutingModule,
        MatListModule
      ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuasarAboutComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

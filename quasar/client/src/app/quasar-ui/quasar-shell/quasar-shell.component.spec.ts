
import { fakeAsync, ComponentFixture, TestBed } from '@angular/core/testing';

import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MatSidenavModule, MatToolbarModule, MatListModule, MatButton, MatButtonModule, MatIconModule } from '@angular/material';
import { QuasarShellComponent } from './quasar-shell.component';
import { QuasarMenuComponent } from '../quasar-menu/quasar-menu.component';

describe('QuasarShellComponent', () => {
  let component: QuasarShellComponent;
  let fixture: ComponentFixture<QuasarShellComponent>;

  beforeEach(fakeAsync(() => {
    TestBed.configureTestingModule({
      declarations: [
        QuasarShellComponent,
        QuasarMenuComponent,
      ],
      imports:[
        BrowserAnimationsModule,
        MatSidenavModule,
        MatToolbarModule,
        MatListModule,
        MatButtonModule,
        MatIconModule
      ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(QuasarShellComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should compile', () => {
    expect(component).toBeTruthy();
  });
});

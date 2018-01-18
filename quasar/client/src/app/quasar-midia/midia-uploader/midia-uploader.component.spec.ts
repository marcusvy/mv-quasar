import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MidiaUploaderComponent } from './midia-uploader.component';

describe('MidiaUploaderComponent', () => {
  let component: MidiaUploaderComponent;
  let fixture: ComponentFixture<MidiaUploaderComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MidiaUploaderComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MidiaUploaderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

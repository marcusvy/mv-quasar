/* tslint:disable:no-unused-variable */
import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { By } from '@angular/platform-browser';
import { DebugElement } from '@angular/core';

import { IconsetComponent } from './iconset.component';

describe('IconsetComponent', () => {
  let component: IconsetComponent;
  let fixture: ComponentFixture<IconsetComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ IconsetComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(IconsetComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

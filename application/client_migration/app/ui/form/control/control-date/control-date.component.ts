import { Component, Renderer2, ViewChild, ElementRef, Input, OnInit, AfterViewInit, OnDestroy } from '@angular/core';

// import flatpickr from 'flatpickr';
// import * as weekSelectPlugin from 'flatpickr/src/plugins/weekSelect/weekSelect';
// import * as confirmDatePlugin from 'flatpickr/src/plugins/confirmDate/confirmDate';
// import { Instance } from "flatpickr/src/types/instance";
// import { CustomLocale } from "flatpickr/src/types/locale";
// import { Options, ParsedOptions, Hook } from "flatpickr/src/types/options";

// import * as weekSelectPlugin from '../../../core/flatpickr/plugins/week-select/week-select';
// import * as confirmDatePlugin from 'flatpickr/dist/plugins/confirmDate/confirmDate';

import { AbstractControl } from '../abstract-control';

@Component({
  selector: 'mv-control-date',
  templateUrl: './control-date.component.html',
  styleUrls: ['./control-date.component.scss']
})
export class ControlDateComponent
  extends AbstractControl
  implements OnInit, OnDestroy, AfterViewInit {

  @ViewChild('formControl') formControl: ElementRef;
  @Input() value: any = '';
  @Input('id') _id: string = '';
  @Input() placeholder: string = '';
  @Input() disabled = false;
  @Input() required = false;
  errorInvalid = false;

  /**
   * Flatpickr
   */
  private flatpickr: any;
  @Input() options: any = {};
  @Input() mode: "single" | "multiple" | "range" = 'single';
  @Input() altFormat: string = 'd/m/Y';
  @Input() altInput: boolean = true;
  @Input() altInputClass: string = '';
  @Input() allowInput: boolean = false;
  @Input() clickOpens: boolean = true;
  @Input() dateFormat: string | null = "Y-m-d";
  @Input() defaultDate: Date | Date[];
  @Input() defaultHour: number = 12;
  @Input() defaultMinute: number = 0;
  @Input() disable: Date[] = [];
  @Input() disableMobile: boolean = true;
  @Input() enable: Date[] = [];
  @Input() enableTime: boolean = false;
  @Input() enableTimeOnly: boolean = false;
  @Input() enableWeek: boolean = false;
  @Input() enableSeconds: boolean = false;
  @Input() enableConfirm: boolean = false;
  @Input() hourIncrement: number = 1;
  @Input() inline: boolean = false;
  @Input() maxDate: Date | string | number = null;
  @Input() minDate: Date | string | number = null;
  @Input() minuteIncrement: number = 5;
  // @Input() nextArrow?: string;
  @Input() noCalendar: boolean = false;
  @Input() onChange;
  @Input() onClose;
  @Input() onOpen;
  @Input() onReady;
  @Input() onMonthChange;
  @Input() onYearChange;
  @Input() onValueUpdate;
  @Input() onDayCreate;
  // @Input() prevArrow?: string;
  @Input() shorthandCurrentMonth: boolean = false;
  @Input() static: boolean = false;
  @Input() time_24hr: boolean = true;
  @Input() utc: boolean = false;
  @Input() weekNumbers?: boolean = false;

  private _plugins = [];

  // @Input() locale?: string | Locale;


  get id() {
    return this._id.concat(this._gen);
  }

  constructor(_renderer: Renderer2) {
    super(_renderer);
  }

  ngOnInit() {
    this.setupInitalValue();
  }

  ngAfterViewInit() {
    this.setupFlatpickr();
  }

  setupInitalValue() {
    this.value = this._control.value;
  }

  setupFlatpickr() {
    if (this.enableTime) {
      this.altFormat += " H:i"
    }
    if (this.enableSeconds) {
      this.altFormat += ":S";
    }
    if (this.enableTimeOnly) {
      this.altFormat = "F j, Y";
      this.altInput = false;
      this.dateFormat = "H:i";
      this.defaultHour = 12;
      this.defaultMinute = 0;
      this.enableTime = true;
      this.enableSeconds = false;
      this.noCalendar = true;
    }
    if (this.enableWeek) {
      // this._plugins.push(weekSelectPlugin.default());
    }
    if (this.enableConfirm) {
      // this._plugins.push(confirmDatePlugin.default({}));
    }
    let defaultFlatpickrOptions: any = {
      // locale: CustomLocale.,
      onChange: (selectedDates, dateStr, instance) => { this.onFlatpickrChange(selectedDates, dateStr, instance) },
      onClose: this.onClose,
      onOpen: this.onOpen,
      onReady: this.onReady,
      onMonthChange: this.onMonthChange,
      onYearChange: this.onYearChange,
      onValueUpdate: this.onValueUpdate,
      onDayCreate: this.onDayCreate,
      plugins: this._plugins
    };
    let setupOptions = Object.assign(this.options, {
      mode: this.mode,
      altFormat: this.altFormat,
      altInput: this.altInput,
      altInputClass: this.altInputClass,
      allowInput: this.allowInput,
      clickOpens: this.clickOpens,
      dateFormat: this.dateFormat,
      defaultDate: this.defaultDate,
      defaultHour: this.defaultHour,
      defaultMinute: this.defaultMinute,
      disable: this.disable,
      disableMobile: this.disableMobile,
      enable: this.enable,
      enableTime: this.enableTime,
      enableSeconds: this.enableSeconds,
      hourIncrement: this.hourIncrement,
      inline: this.inline,
      maxDate: this.maxDate,
      minDate: this.minDate,
      minuteIncrement: this.minuteIncrement,

      noCalendar: this.noCalendar,

      shorthandCurrentMonth: this.shorthandCurrentMonth,
      static: this.static,
      time_24hr: this.time_24hr,
      utc: this.utc,
      weekNumbers: this.weekNumbers,
    });
    let flatpickOptions = Object.assign(
      defaultFlatpickrOptions,
      this.options,
      setupOptions
    );
    // flatpickr(this.formControl.nativeElement, flatpickOptions);
    // this.flatpickr = this.formControl.nativeElement['_flatpickr'];
  }

  /**
   * Change value of input
   *
   * @param {Date[]} selectedDates
   * @param {string} dateStr
   * @param {Flatpickr} instance
   * @memberof ControlDateComponent
   */
  onFlatpickrChange(selectedDates: Date[], dateStr: string, instance: any) {
    let output: Date[] | string | any = selectedDates;
    this.value = dateStr;

    if (this.enableWeek) {
      const numberWeek = (selectedDates[0]) ? instance['config'].getWeek(selectedDates[0]) : null;
      this.value = numberWeek;
      output = numberWeek;
    }
    if (this.enableTimeOnly) {
      output = dateStr;
    }
    this.value = output;
  }

  /**
   * Emit the value for control
   *
   * @param {*} event
   * @memberof ControlDateComponent
   */
  onInput(event: any) {
    let element: any = event.target;
    // let value = element.value;
    this._value.next(this.value);
    this.errorInvalid = this._control.invalid;
  }

  onFocus(result: boolean) {
    this._touch.next(result);
  }

  ngOnDestroy() {
    //this.flatpickr.destroy();
  }

  onReset() {
    this.flatpickr.clear();
    this.flatpickr.redraw();
  }

}

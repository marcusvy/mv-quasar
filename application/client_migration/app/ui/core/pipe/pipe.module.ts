import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { MvAlphaPipe } from './alpha/alpha.pipe';
import { MvBoletoPipe } from './boleto/boleto.pipe';
import { MvBytesPipe } from './bytes/bytes.pipe';
import { MvCepPipe } from './cep/cep.pipe';
import { MvCnpjPipe } from './cnpj/cnpj.pipe';
import { MvCounterPipe } from './counter/counter.pipe';
import { MvCpfPipe } from './cpf/cpf.pipe';
import { MvDatePipe } from './date/date.pipe';
import { MvDigitsPipe } from './digits/digits.pipe';
import { MvMomentPipe } from './moment/moment.pipe';
import { MvPhonePipe } from './phone/phone.pipe';
import { MvTimeAgoPipe } from './time-ago/time-ago.pipe';
import { MvTimeDifferencePipe } from './time-difference/time-difference.pipe';
import { MvTruncatePipe } from './truncate/truncate.pipe';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    MvAlphaPipe,
    MvBoletoPipe,
    MvBytesPipe,
    MvCepPipe,
    MvCnpjPipe,
    MvCounterPipe,
    MvCpfPipe,
    MvDatePipe,
    MvDigitsPipe,
    MvMomentPipe,
    MvPhonePipe,
    MvTimeAgoPipe,
    MvTimeDifferencePipe,
    MvTruncatePipe,
  ],
  exports: [
    MvAlphaPipe,
    MvBoletoPipe,
    MvBytesPipe,
    MvCepPipe,
    MvCnpjPipe,
    MvCounterPipe,
    MvCpfPipe,
    MvDatePipe,
    MvDigitsPipe,
    MvMomentPipe,
    MvPhonePipe,
    MvTimeAgoPipe,
    MvTimeDifferencePipe,
    MvTruncatePipe,
  ],
  providers: [
    MvAlphaPipe,
    MvBoletoPipe,
    MvBytesPipe,
    MvCepPipe,
    MvCnpjPipe,
    MvCounterPipe,
    MvCpfPipe,
    MvDatePipe,
    MvDigitsPipe,
    MvMomentPipe,
    MvPhonePipe,
    MvTimeAgoPipe,
    MvTimeDifferencePipe,
    MvTruncatePipe,
  ]
})
export class PipeModule { }

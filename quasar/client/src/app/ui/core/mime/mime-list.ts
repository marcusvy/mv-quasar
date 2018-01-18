import { MimeItem } from './mime-item';

export const MimeList: MimeItem[] = [
  {
    category: 'file',
    icon: 'file',
    mime: []
  },
  {
    category: 'code',
    icon: 'file-code-o',
    mime: [
      'text/html',
      'text/css',
      'text/javascript'
    ]
  },
  {
    category: 'video',
    icon: 'file-video-o',
    mime: [
      'video/webm',
      'video/ogg',
    ]
  },
  {
    category: 'audio',
    icon: 'file-audio-o',
    mime: [
      'audio/midi',
      'audio/mpeg',
      'audio/webm',
      'audio/ogg',
      'audio/wav',
    ]
  },
  {
    category: 'image',
    icon: 'file-image-o',
    mime: [
      'image/gif',
      'image/png',
      'image/jpeg',
      'image/bmp',
      'image/webp'
    ]
  },
  {
    category: 'presentation',
    icon: 'file-powerpoint-o',
    mime: [
      'application/vnd.ms-powerpoint.addin.macroEnabled.12',
      'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
      'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
      'application/vnd.ms-powerpoint.template.macroEnabled.12',
      'application/vnd.ms-powerpoint',
      'application/vnd.oasis.opendocument.presentation-template',
      'application/vnd.oasis.opendocument.presentation',
      'application/vnd.openxmlformats-officedocument.presentationml.presentation',
      'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
      'application/vnd.openxmlformats-officedocument.presentationml.template',
    ]
  },
  {
    category: 'spreadsheet',
    icon: 'file-excel-o',
    mime: [
      'application/vnd.ms-excel.addin.macroEnabled.12',
      'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
      'application/vnd.ms-excel.sheet.macroEnabled.12',
      'application/vnd.ms-excel.template.macroEnabled.12',
      'application/vnd.ms-excel',
      'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
      'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
    ]
  },
  {
    category: 'document',
    icon: 'file-word-o',
    mime: [
      'application/msword',
      'application/vnd.ms-word.document.macroEnabled.12',
      'application/vnd.ms-word.template.macroEnabled.12',
      'application/vnd.oasis.opendocument.text ',
      'application/vnd.oasis.opendocument.text-master',
      'application/vnd.oasis.opendocument.text-template',
      'application/vnd.oasis.opendocument.text-web',
      'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
      'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
    ]
  },
  {
    category: 'pdf',
    icon: 'file-pdf-o',
    mime: [
      'application/pdf'
    ]
  },
  {
    category: 'text',
    icon: 'file-text',
    mime: [
      'text/plain'
    ]
  },
];

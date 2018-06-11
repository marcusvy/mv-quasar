import { ApiDataSource } from "../lib";

export const MIDIA_API_DATASOURCE: ApiDataSource = {
  token: 'user',
  routes: [
    { name: 'audio', url: '/api/midia/audio' },
    { name: 'image', url: '/api/midia/image' },
    { name: 'video', url: '/api/midia/video' },
  ],
  generators: [
    { name: 'audio:page', callback: (page = 1) => `/api/midia/audio/page/${page}` },
    { name: 'audio:id', callback: (id) => `/api/midia/audio/{id}` },
    { name: 'image:page', callback: (page = 1) => `/api/midia/image/page/${page}` },
    { name: 'image:id', callback: (id) => `/api/midia/image/{id}` },
    { name: 'video:page', callback: (page = 1) => `/api/midia/video/page/${page}` },
    { name: 'video:id', callback: (id) => `/api/midia/video/{id}` },
  ]
};

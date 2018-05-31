import { ApiDataSource } from "../lib";

export const AUTH_API_DATASOURCE: ApiDataSource = {
  token: 'user',
  routes: [
    { name: 'audio', url: '/api/midia/audio' },
    { name: 'image', url: '/api/midia/image' },
    { name: 'video', url: '/api/midia/video' },
  ],
  generators: [
    { name: 'audio:list', callback: (page = 1) => `/api/midia/audio/list/${page}` },
    { name: 'audio:fetch', callback: (id) => `/api/midia/audio/{id}` },
    { name: 'image:list', callback: (page = 1) => `/api/midia/image/list/${page}` },
    { name: 'image:fetch', callback: (id) => `/api/midia/image/{id}` },
    { name: 'video:list', callback: (page = 1) => `/api/midia/video/list/${page}` },
    { name: 'video:fetch', callback: (id) => `/api/midia/video/{id}` },
  ]
};

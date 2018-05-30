import { ApiDataSource } from "../lib";

export const AUTH_API_DATASOURCE: ApiDataSource = {
  token: 'user',
  routes: [
    { name: 'user', url: '/api/user' },
    { name: 'perfil', url: '/api/user-perfil' },
    { name: 'role', url: '/api/user-role' },
  ],
  generators: [
    { name: 'user:list', callback: (page = 1) => `/api/user/list/${page}` },
    { name: 'user:fetch', callback: (id) => `/api/user/${id}` },
    { name: 'perfil:list', callback: (page = 1) => `/api/user-perfil/list/${page}` },
    { name: 'perfil:fetch', callback: (id) => `/api/user-perfil/{id}` },
    { name: 'role:list', callback: (page = 1) => `/api/user-role/list/${page}` },
    { name: 'role:fetch', callback: (id) => `/api/user-role/${id}` },
  ]
};

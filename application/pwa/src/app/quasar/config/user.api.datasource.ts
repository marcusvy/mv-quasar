import { ApiDataSource } from "../lib";

export const USER_API_DATASOURCE: ApiDataSource = {
  token: 'user',
  routes: [
    { name: 'user', url: '/api/user' },
    { name: 'perfil', url: '/api/user-perfil' },
    { name: 'role', url: '/api/user-role' },
  ],
  generators: [
    { name: 'user:page', callback: (page = 1) => `/api/user/page/${page}` },
    { name: 'user:id', callback: (id) => `/api/user/${id}` },
    { name: 'perfil:page', callback: (page = 1) => `/api/user-perfil/page/${page}` },
    { name: 'perfil:id', callback: (id) => `/api/user-perfil/{id}` },
    { name: 'role:page', callback: (page = 1) => `/api/user-role/page/${page}` },
    { name: 'role:id', callback: (id) => `/api/user-role/${id}` },
  ]
};

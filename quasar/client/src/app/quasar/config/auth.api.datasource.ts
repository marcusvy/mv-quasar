import { ApiDataSource } from "../lib";

export const AUTH_API_DATASOURCE: ApiDataSource = {
  token: 'auth',
  routes: [
    { name: 'authenticate', url: '/api/auth' },
    { name: 'signin', url: '/api/user/register' },
  ],
  generators: [
    { name: 'activate', callback: (identity, key) => `/api/user/activate/for/${identity}/by/${key}` }
  ]
};

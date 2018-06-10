import { ApiDataSource } from "../lib";

export const AUTH_API_DATASOURCE: ApiDataSource = {
  token: 'auth',
  routes: [
    { name: 'auth', url: '/api/auth' },
    { name: 'register', url: '/api/user/register' },
  ],
  generators: [
    { name: 'activate:identity:key', callback: (identity, key) => `/api/user/activate/for/${identity}/by/${key}` }
  ]
};

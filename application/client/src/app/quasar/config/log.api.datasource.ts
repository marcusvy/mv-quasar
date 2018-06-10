import { ApiDataSource } from "../lib";

export const LOG_API_DATASOURCE: ApiDataSource = {
  token: "log",
  routes: [{ name: "log", url: "/api/logger" }],
  generators: [
    { name: "log:page", callback: (page = 1) => `/api/logger/list/${page}` },
    { name: "log:id", callback: id => `/api/logger/${id}` }
  ]
};

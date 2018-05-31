import { InjectionToken } from "@angular/core";
import { RouteApiDataSource } from "./RouteApiDataSource";
import { GeneratorApiDataSource } from "./GeneratorApiDataSource";

export interface ApiDataSource {
  token: string;
  routes?: RouteApiDataSource[];
  generators?: GeneratorApiDataSource[];
}

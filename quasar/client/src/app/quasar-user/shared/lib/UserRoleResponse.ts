import { ApiResponse } from './../../../quasar/shared/lib/ApiResponse';
import { UserRole } from './UserRole';

export class UserRoleResponse
  extends ApiResponse {
  collection: UserRole[];
}

<?php

namespace App\Services;

use App\Models\UserRoleModel;
use App\Models\RoleModel;
use App\Models\PermissionModel;

class AuthorizationService
{
    protected $userRoleModel;
    protected $roleModel;
    protected $permissionModel;

    // Constructor to load models
    public function __construct()
    {
        $this->userRoleModel = new UserRoleModel();
        $this->roleModel = new RoleModel();
        $this->permissionModel = new PermissionModel();
    }

    // Check if a user has a specific role
    public function userHasRole(int $userId, string $roleName): bool
    {
        return $this->userRoleModel
            ->join('roles', 'user_roles.role_id = roles.id')
            ->where('user_roles.user_id', $userId)
            ->where('roles.name', $roleName)
            ->countAllResults() > 0;
    }

    // Check if a user has a specific permission
    public function userHasPermission(int $userId, string $permissionName): bool
    {
        return $this->permissionModel
            ->join('role_permissions', 'permissions.id = role_permissions.permission_id')
            ->join('user_roles', 'role_permissions.role_id = user_roles.role_id')
            ->where('user_roles.user_id', $userId)
            ->where('permissions.name', $permissionName)
            ->countAllResults() > 0;
    }
}

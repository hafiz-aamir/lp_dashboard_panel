<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use App\Models\Menu;
use App\Models\User_special_permission;


trait PermissionTrait
{
    /**
     * Check if the authenticated user has a specific permission for a given menu.
     *
     * @param string $permissionName
     * @param string $menuName
     * @return bool
     */
    public function hasPermission($permissionName, $menuName)
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }

        // Super admin role check
        if ($user->role_id == 1) {
            return true; // Super admin has access to all menus
        }
        else{

            // Fetch permission ID from the permission name
            $permission = Permission::where('permission', $permissionName)->first();

            if (!$permission) {
                return false;
            }

            // Fetch menu ID from the menu name
            $menu = Menu::where('name', $menuName)->first();

            if (!$menu) {
                return false;
            }

            // Check if the user has the specific permission for the given menu
            $hasPermission = User_special_permission::where('user_id', $user->id)
                ->where('menu_id', $menu->id)
                ->where('permission_id', $permission->id)
                ->where('status', '1')
                ->exists();

            return $hasPermission;

        }

        
    }
}


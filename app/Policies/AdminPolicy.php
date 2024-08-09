<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function viewAdmins(Admin $admin)
    {
        return in_array($admin->permissions, ['full_access', 'edit_delete_except_admin', 'view_only']);
    }

    public function createAdmin(Admin $admin)
    {
        return $admin->permissions === 'full_access';
    }

    public function updateAdmin(Admin $admin)
    {
        return in_array($admin->permissions, ['full_access', 'edit_delete_except_admin']);
    }

    public function deleteAdmin(Admin $admin)
    {
        return $admin->permissions === 'full_access';
    }

    public function changeAdminPermissions(Admin $admin)
    {
        return $admin->permissions === 'full_access';
    }
}

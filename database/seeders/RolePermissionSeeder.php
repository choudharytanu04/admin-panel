<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $superAdmin = Role::where('slug', 'super_admin')->first();
        $admin = Role::where('slug', 'admin')->first();
        $staff = Role::where('slug', 'staff')->first();

        $categoryView = Permission::where('slug', 'category.view')->first();
        $categoryCreate = Permission::where('slug', 'category.create')->first();
        $categoryEdit = Permission::where('slug', 'category.edit')->first();
        $categoryDelete = Permission::where('slug', 'category.delete')->first();

        $userView = Permission::where('slug', 'user.view')->first();
        $userCreate = Permission::where('slug', 'user.create')->first();
        $userEdit = Permission::where('slug', 'user.edit')->first();
        $userDelete = Permission::where('slug', 'user.delete')->first();

        // Super Admin - Full Access
        $superAdmin->permissions()->sync([
            $categoryView->id,
            $categoryCreate->id,
            $categoryEdit->id,
            $categoryDelete->id,
            $userView->id,
            $userCreate->id,
            $userEdit->id,
            $userDelete->id,
        ]);

        // Admin - Category full access + User view/create/edit
        $admin->permissions()->sync([
            $categoryView->id,
            $categoryCreate->id,
            $categoryEdit->id,
          //  $categoryDelete->id,
            $userView->id,
            $userCreate->id,
            $userEdit->id,
        ]);

        // Staff - Only view access
        $staff->permissions()->sync([
            $categoryView->id,
            $userView->id,
        ]);
    }
}
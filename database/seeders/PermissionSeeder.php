<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'View Categories',
                'slug' => 'category.view',
            ],
            [
                'name' => 'Create Categories',
                'slug' => 'category.create',
            ],
            [
                'name' => 'Edit Categories',
                'slug' => 'category.edit',
            ],
            [
                'name' => 'Delete Categories',
                'slug' => 'category.delete',
            ],

            [
                'name' => 'View Users',
                'slug' => 'user.view',
            ],
            [
                'name' => 'Create Users',
                'slug' => 'user.create',
            ],
            [
                'name' => 'Edit Users',
                'slug' => 'user.edit',
            ],
            [
                'name' => 'Delete Users',
                'slug' => 'user.delete',
            ],
        ];

        Permission::insert($permissions);
    }
}
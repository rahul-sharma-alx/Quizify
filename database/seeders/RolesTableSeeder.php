<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Administrator with full access'
            ],
            [
                'name' => 'Editor',
                'slug' => 'editor',
                'description' => 'Can manage content but not users'
            ],
            [
                'name' => 'User',
                'slug' => 'user',
                'description' => 'Regular authenticated user'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}

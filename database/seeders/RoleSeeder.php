<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'regular-user', 'guard_name' => 'users']);
        Role::create(['name' => 'premium-user', 'guard_name' => 'users']);
        Role::create(['name' => 'owner', 'guard_name' => 'owners']);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Administrator']);
       $permission = Permission::create(['name' => 'manage tasks']);
       
       $adminUser = User::factory()->create([
        'email' => 'admin@admin.com',
        'password' => bcrypt('admin')
       ]);
       $adminUser->assignRole('Administrator');
    }
}

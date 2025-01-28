<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'add stores']);
        Permission::create(['name' => 'add products']);
        $adminRole=Role::findByName('admin');
        $adminRole->givePermissionTo('add stores', 'add products');
    }
}

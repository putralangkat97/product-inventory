<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $superadmin_role = Role::create(['name' => 'superadmin']);
        $staff_role = Role::create(['name' => 'staff']);
        $user_role = Role::create(['name' => 'user']);

        $permissions = [
            ['name' => 'create user'],
            ['name' => 'edit user'],
            ['name' => 'delete user'],
            ['name' => 'view user'],
            ['name' => 'create stock'],
            ['name' => 'edit stock'],
            ['name' => 'delete stock'],
            ['name' => 'view stock'],
            ['name' => 'create stock request'],
            ['name' => 'edit stock request'],
            ['name' => 'delete stock request'],
            ['name' => 'view stock request'],
            ['name' => 'accept stock request'],
            ['name' => 'reject stock request'],
            ['name' => 'view stock report'],
            ['name' => 'export stock report'],
            ['name' => 'create satuan'],
            ['name' => 'edit satuan'],
            ['name' => 'delete satuan'],
            ['name' => 'view satuan'],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $superadmin_role->givePermissionTo('create user');
        $superadmin_role->givePermissionTo('edit user');
        $superadmin_role->givePermissionTo('delete user');
        $superadmin_role->givePermissionTo('view user');
        $superadmin_role->givePermissionTo('create stock');
        $superadmin_role->givePermissionTo('edit stock');
        $superadmin_role->givePermissionTo('delete stock');
        $superadmin_role->givePermissionTo('view stock');
        $superadmin_role->givePermissionTo('accept stock request');
        $superadmin_role->givePermissionTo('reject stock request');
        $superadmin_role->givePermissionTo('view stock report');
        $superadmin_role->givePermissionTo('export stock report');
        $superadmin_role->givePermissionTo('create satuan');
        $superadmin_role->givePermissionTo('edit satuan');
        $superadmin_role->givePermissionTo('delete satuan');
        $superadmin_role->givePermissionTo('view satuan');

        $staff_role->givePermissionTo('view user');
        $staff_role->givePermissionTo('view stock');
        $staff_role->givePermissionTo('view satuan');
        $staff_role->givePermissionTo('view stock report');
        $staff_role->givePermissionTo('export stock report');
        $staff_role->givePermissionTo('accept stock request');
        $staff_role->givePermissionTo('reject stock request');

        $user_role->givePermissionTo('view stock');
        $user_role->givePermissionTo('create stock request');
        $user_role->givePermissionTo('edit stock request');
        $user_role->givePermissionTo('delete stock request');
        $user_role->givePermissionTo('view stock request');

        $division_one = Division::where('name', 'Division 1')->first();
        $division_two = Division::where('name', 'Division 2')->first();
        $division_three = Division::where('name', 'Division 3')->first();

        $superadmin = User::create([
            'first_name' => 'Superadmin',
            'last_name' => 'User',
            'full_name' => 'Superadmin User',
            'email' => 'superadmin@anggitutomo.com',
            'username' => 'superadmin',
            'password' => bcrypt('asdf1234**'),
            'is_active' => 1
        ]);
        $superadmin->assignRole($superadmin_role);
        $superadmin->divisions()->attach($division_one);

        $staff = User::create([
            'first_name' => 'Staff',
            'last_name' => 'User',
            'full_name' => 'Staff User',
            'email' => 'staff@anggitutomo.com',
            'username' => 'staff',
            'password' => bcrypt('asdf1234**'),
            'is_active' => 1
        ]);
        $staff->assignRole($staff_role);
        $staff->divisions()->attach($division_two);

        $user = User::create([
            'first_name' => 'User',
            'last_name' => 'Biasa',
            'full_name' => 'User Biasa',
            'email' => 'user@anggitutomo.com',
            'username' => 'user',
            'password' => bcrypt('asdf1234**'),
            'is_active' => 1
        ]);
        $user->assignRole($user_role);
        $user->divisions()->attach($division_three);
    }
}

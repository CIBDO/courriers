<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Créer des permissions
        $permissions = [
            'edit articles',
            'delete articles',
            'create articles',
            'view articles'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Créer des rôles et attribuer des permissions
        $roles = [
            'super-admin' => Permission::all(),
            'admin' => ['edit articles', 'create articles', 'view articles'],
            'agent' => ['view articles']
        ];

        foreach ($roles as $role => $perms) {
            $roleInstance = Role::create(['name' => $role]);
            $roleInstance->givePermissionTo($perms);
        }
    }
}

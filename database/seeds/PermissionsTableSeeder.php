<?php

use Illuminate\Database\Seeder;
<<<<<<< HEAD

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
=======
use Reactor\Users\Permission;
use Reactor\Users\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 32,
                'name' => 'ACCESS_DOCTORS',
            ),
            1 => 
            array (
                'id' => 21,
                'name' => 'ACCESS_DOCUMENTS',
            ),
            2 => 
            array (
                'id' => 23,
                'name' => 'ACCESS_HISTORY',
            ),
            3 => 
            array (
                'id' => 26,
                'name' => 'ACCESS_MAILINGLISTS',
            ),
            4 => 
            array (
                'id' => 24,
                'name' => 'ACCESS_MAILINGS',
            ),
            5 => 
            array (
                'id' => 2,
                'name' => 'ACCESS_MAINTENANCE',
            ),
            6 => 
            array (
                'id' => 19,
                'name' => 'ACCESS_NODES',
            ),
            7 => 
            array (
                'id' => 3,
                'name' => 'ACCESS_NODETYPES',
            ),
            8 => 
            array (
                'id' => 5,
                'name' => 'ACCESS_PERMISSIONS',
            ),
            9 => 
            array (
                'id' => 18,
                'name' => 'ACCESS_REACTOR',
            ),
            10 => 
            array (
                'id' => 7,
                'name' => 'ACCESS_ROLES',
            ),
            11 => 
            array (
                'id' => 9,
                'name' => 'ACCESS_SETTINGGROUPS',
            ),
            12 => 
            array (
                'id' => 11,
                'name' => 'ACCESS_SETTINGS',
            ),
            13 => 
            array (
                'id' => 13,
                'name' => 'ACCESS_SETTINGSMODIFY',
            ),
            14 => 
            array (
                'id' => 28,
                'name' => 'ACCESS_SUBSCRIBERS',
            ),
            15 => 
            array (
                'id' => 30,
                'name' => 'ACCESS_TAGS',
            ),
            16 => 
            array (
                'id' => 15,
                'name' => 'ACCESS_UPDATE',
            ),
            17 => 
            array (
                'id' => 16,
                'name' => 'ACCESS_USERS',
            ),
            18 => 
            array (
                'id' => 22,
                'name' => 'EDIT_DOCUMENTS',
            ),
            19 => 
            array (
                'id' => 27,
                'name' => 'EDIT_MAILINGLISTS',
            ),
            20 => 
            array (
                'id' => 25,
                'name' => 'EDIT_MAILINGS',
            ),
            21 => 
            array (
                'id' => 20,
                'name' => 'EDIT_NODES',
            ),
            22 => 
            array (
                'id' => 4,
                'name' => 'EDIT_NODETYPES',
            ),
            23 => 
            array (
                'id' => 6,
                'name' => 'EDIT_PERMISSIONS',
            ),
            24 => 
            array (
                'id' => 8,
                'name' => 'EDIT_ROLES',
            ),
            25 => 
            array (
                'id' => 10,
                'name' => 'EDIT_SETTINGGROUPS',
            ),
            26 => 
            array (
                'id' => 12,
                'name' => 'EDIT_SETTINGS',
            ),
            27 => 
            array (
                'id' => 14,
                'name' => 'EDIT_SETTINGSMODIFY',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'EDIT_SUBSCRIBERS',
            ),
            29 => 
            array (
                'id' => 31,
                'name' => 'EDIT_TAGS',
            ),
            30 => 
            array (
                'id' => 17,
                'name' => 'EDIT_USERS',
            ),
            31 => 
            array (
                'id' => 1,
                'name' => 'SUPERADMIN',
            ),
        ));
        
        
    }
}
=======
        DB::table('permissions')->truncate();
        DB::table('permission_role')->truncate();

        // Create superadmin permissions
        $permissions = $this->getSuperadminPermissionsList();
        $role = Role::whereName('SUPERADMIN')->first();

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            $role->givePermissionTo($permission);
        }

        // Create admin permissions
        $permissions = $this->getAdminPermissionsList();
        $role = Role::whereName('ADMINISTRATOR')->first();

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            $role->givePermissionTo($permission);
        }

        // Associate editor permissions
        $permissions = $this->getEditorPermissionsList();
        $role = Role::whereName('EDITOR')->first();

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            $role->givePermissionTo($permission);
        }

    }

    /**
     * Returns the permissions list the superadmin role
     *
     * @return array
     */
    protected function getSuperadminPermissionsList()
    {
        return ['SUPERADMIN'];
    }


    /**
     * Returns the permissions list the admin role
     *
     * @return array
     */
    protected function getAdminPermissionsList()
    {
        return [
            'ACCESS_MAINTENANCE',
            'ACCESS_NODETYPES',
            'EDIT_NODETYPES',
            'ACCESS_PERMISSIONS',
            'EDIT_PERMISSIONS',
            'ACCESS_ROLES',
            'EDIT_ROLES',
            'ACCESS_SETTINGGROUPS',
            'EDIT_SETTINGGROUPS',
            'ACCESS_SETTINGS',
            'EDIT_SETTINGS',
            'ACCESS_SETTINGSMODIFY',
            'EDIT_SETTINGSMODIFY',
            'ACCESS_UPDATE',
            'ACCESS_USERS',
            'EDIT_USERS'
        ];
    }

    /**
     * Returns the permissions list for the editor role
     *
     * @return array
     */
    protected function getEditorPermissionsList()
    {
        return [
            'ACCESS_REACTOR',
            'ACCESS_NODES',
            'EDIT_NODES',
            'ACCESS_DOCUMENTS',
            'EDIT_DOCUMENTS',
            'ACCESS_HISTORY',
            'ACCESS_MAILINGS',
            'EDIT_MAILINGS',
            'ACCESS_MAILINGLISTS',
            'EDIT_MAILINGLISTS',
            'ACCESS_SUBSCRIBERS',
            'EDIT_SUBSCRIBERS',
            'ACCESS_TAGS',
            'EDIT_TAGS'
        ];
    }

}
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c

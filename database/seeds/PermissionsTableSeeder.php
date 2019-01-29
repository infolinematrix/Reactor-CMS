<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

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
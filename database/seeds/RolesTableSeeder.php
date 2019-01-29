<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'SUPERADMIN',
                'label' => 'Super Admin',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ADMINISTRATOR',
                'label' => 'Administrator',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'EDITOR',
                'label' => 'Editor',
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'PUBLICUSER',
                'label' => 'PUBLICUSER',
            ),
        ));
        
        
    }
}
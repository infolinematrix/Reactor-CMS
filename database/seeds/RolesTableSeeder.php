<?php

use Illuminate\Database\Seeder;
<<<<<<< HEAD

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
=======
use Reactor\Users\Role;

class RolesTableSeeder extends Seeder
{
    /** @var array */
    protected $roles = [
        'en' => [
            ['name' => 'SUPERADMIN', 'label' => 'Super Admin'],
            ['name' => 'ADMINISTRATOR', 'label' => 'Administrator'],
            ['name' => 'EDITOR', 'label' => 'Editor']
        ],
        'tr' => [
            ['name' => 'SUPERADMIN', 'label' => 'Üstün Yönetici'],
            ['name' => 'ADMINISTRATOR', 'label' => 'Admin'],
            ['name' => 'EDITOR', 'label' => 'Editör']
        ]
    ];

    /**
     * Run the database seeds.
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        

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
        
        
=======
        DB::table('roles')->truncate();

        $locale = env('REACTOR_LOCALE', 'en');

        $roles = $this->roles[$locale];

        foreach ($roles as $role) {
            Role::create($role);
        }
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
    }
}
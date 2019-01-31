<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        chronicle()->pauseRecording();

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(NodeTypesTableSeeder::class);
        $this->call(NodeFieldsTableSeeder::class);
        $this->call(NodesTableSeeder::class);
        $this->call(NodeSourcesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TagTranslationsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(PermissionUserTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(NsBasicpagesTableSeeder::class);


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Model::reguard();

    }
}

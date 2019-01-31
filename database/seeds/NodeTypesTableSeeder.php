<?php

use Illuminate\Database\Seeder;

class NodeTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('node_types')->delete();
        
        \DB::table('node_types')->insert(array (
            0 => 
            array (
                'id' => 34,
                'name' => 'basicpage',
                'label' => 'Basic Page',
                'visible' => 1,
                'hides_children' => 1,
                'color' => '#F1C40F',
                'taggable' => 0,
                'mailing' => 0,
                'allowed_children' => '[]',
                'custom_form' => 'NULL',
                'created_at' => '2018-03-08 16:16:27',
                'updated_at' => '2018-03-08 16:16:27',
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;

class NodesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nodes')->delete();
        
        \DB::table('nodes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'node_type_id' => 34,
                'user_id' => 1,
                '_lft' => 1,
                '_rgt' => 1,
                'parent_id' => 0,
                'mailing' => 0,
                'visible' => 1,
                'sterile' => 0,
                'home' => 1,
                'locked' => 0,
                'layout' => NULL,
                'custom_field' => NULL,
                'status' => 50,
                'hides_children' => 0,
                'priority' => 1.0,
                'published_at' => NULL,
                'children_order' => '_lft',
                'children_order_direction' => 'asc',
                'children_display_mode' => 'list',
                'created_at' => '2018-03-06 00:00:00',
                'updated_at' => '2018-03-14 00:00:00',
            ),
        ));
        
        
    }
}
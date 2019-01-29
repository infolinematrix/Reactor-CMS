<?php

<<<<<<< HEAD
use Illuminate\Database\Seeder;
=======

use Illuminate\Database\Seeder;
use Reactor\Hierarchy\Node;
use Reactor\Hierarchy\NodeType;
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c

class NodesTableSeeder extends Seeder
{

    /**
<<<<<<< HEAD
     * Auto generated seed file
=======
     * Run the database seeds.
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        

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
=======
        $homepage = NodeType::whereName('homepage')->first()->getKey();
        $basicpage = NodeType::whereName('basicpage')->first()->getKey();

        $home = new Node;
        $home->setNodeTypeByKey($homepage);
        $home->fill([
            'en' => [
                'title' => 'Home',
                'node_name' => 'home',
                'content' => 'Here is your **content**!

You can do great things with the [Reactor CMS](https://github.com/NuclearCMS/Nuclear){blank}!

And it supports [markdown](https://daringfireball.net/projects/markdown/){blank}!'
            ],
            'tr' => [
                'title' => 'Anasayfa',
                'node_name' => 'anasayfa',
                'content' => '**İçeriğiniz** burada!

[Nuclear CMS](https://github.com/Reactor/Reactor-CMS){blank} ile büyük şeyler yapabilirsiniz!

Ayrıca Nuclear [markdown](https://daringfireball.net/projects/markdown/){blank} destekler!'
            ],
            'home' => 1,
            'status' => 50
        ]);
        $home->save();

        $about = new Node;
        $about->setNodeTypeByKey($basicpage);
        $about->fill([
            'en' => [
                'title' => 'About',
                'node_name' => 'about'
            ],
            'tr' => [
                'title' => 'Hakkında',
                'node_name' => 'hakkinda'
            ],
            'status' => 50
        ]);
        $about->appendToNode($home);
        $about->save();

        $contact = new Node;
        $contact->setNodeTypeByKey($basicpage);
        $contact->fill([
            'en' => [
                'title' => 'Contact',
                'node_name' => 'contact'
            ],
            'tr' => [
                'title' => 'İletişim',
                'node_name' => 'iletisim'
            ],
            'status' => 50
        ]);
        $contact->appendToNode($home);
        $contact->save();

    }

>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
}
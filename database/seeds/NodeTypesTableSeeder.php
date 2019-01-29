<?php

<<<<<<< HEAD
use Illuminate\Database\Seeder;
=======

use Illuminate\Database\Seeder;
use Reactor\Hierarchy\Repositories\NodeFieldRepository;
use Reactor\Hierarchy\Repositories\NodeTypeRepository;
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c

class NodeTypesTableSeeder extends Seeder
{

    /**
<<<<<<< HEAD
     * Auto generated seed file
=======
     * Repositories
     */
    protected $nodeTypeRepository;
    protected $nodeFieldRepository;

    /**
     * Constructor
     *
     * @param NodeTypeRepository $nodeTypeRepository
     * @param NodeFieldRepository $nodeFieldRepository
     */
    public function __construct(NodeTypeRepository $nodeTypeRepository, NodeFieldRepository $nodeFieldRepository)
    {
        $this->nodeTypeRepository = $nodeTypeRepository;
        $this->nodeFieldRepository = $nodeFieldRepository;
    }

    /**
     * Run the database seeds.
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        

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
=======
        DB::table('node_types')->truncate();
        DB::table('node_fields')->truncate();

        $basicPage = $this->nodeTypeRepository->create([
            'name' => 'basicpage',
            'label' => trans('install.type_basicpage_label'),
            'color' => '#F1C40F',
            'taggable' => 1
        ]);

        $pageContent = $this->nodeFieldRepository->create($basicPage->getKey(), [
            'name' => 'content',
            'label' => trans('validation.attributes.content'),
            'position' => 1,
            'type' => 'markdown'
        ]);

        $homePage = $this->nodeTypeRepository->create([
            'name' => 'homepage',
            'label' => trans('install.type_homepage_label'),
            'color' => '#F1C40F',
            'visible' => 0,
            'allowed_children' => json_encode([$basicPage->getKey()])
        ]);

        $pageContent = $this->nodeFieldRepository->create($homePage->getKey(), [
            'name' => 'content',
            'label' => trans('validation.attributes.content'),
            'position' => 1,
            'type' => 'markdown'
        ]);
    }

>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
}
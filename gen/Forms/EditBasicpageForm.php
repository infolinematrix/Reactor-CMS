<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditBasicpageForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
<<<<<<< HEAD
        $this->compose('Reactor\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('description', 'textarea', [
            'label' => 'Description',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                    }
=======
        $this->compose('Nuclear\Hierarchy\Http\Forms\NodeSourceForm');
            }
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c

}
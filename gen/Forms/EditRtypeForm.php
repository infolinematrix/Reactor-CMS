<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditRtypeForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->compose('Nuclear\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('description', 'text', [
            'label' => 'Description',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                    }

}
<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditCategoriesForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->compose('Nuclear\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('custom_form', 'text', [
            'label' => 'Custom Form',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('icon', 'text', [
            'label' => 'Icon',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
                        'default_value' => 'noimage.png',
            
            

        ]);
                    }

}
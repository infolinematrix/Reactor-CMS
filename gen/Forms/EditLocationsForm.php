<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditLocationsForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->compose('Nuclear\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('popular', 'select', [
            'label' => 'Make Popular',
            'help_block' => ['text' => ''],

            
            
            'choices' => ['0' => 'No' , '1' => 'Yes']

        ]);
                                $this->add('enabled', 'select', [
            'label' => 'Enabled',
            'help_block' => ['text' => ''],

            
            
            'choices' => ['0' => 'No' , '1' => 'Yes']

        ]);
                    }

}
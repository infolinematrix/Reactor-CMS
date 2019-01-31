<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditEmailtemplateForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->compose('Nuclear\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('variable', 'text', [
            'label' => 'Variable',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('content', 'textarea', [
            'label' => 'Content',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                    }

}
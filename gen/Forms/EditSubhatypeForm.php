<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditSubhatypeForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->compose('Reactor\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('storage', 'text', [
            'label' => 'Storage',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('display', 'text', [
            'label' => 'Display',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                    }

}
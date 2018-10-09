<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditKurtitypeForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->compose('Nuclear\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('kurti_febric', 'text', [
            'label' => 'Kurti Febric',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('kurti_color', 'text', [
            'label' => 'Kurti Color',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('kurti_size', 'select', [
            'label' => 'Kurti Size',
            'help_block' => ['text' => ''],

            
            
            'choices' => ['S' => '36' , 'M' => '38' , 'L' => '40' , 'XL' => '42' , 'XXL' => '44']

        ]);
                    }

}
<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditPlanForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->compose('Nuclear\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('plan_price', 'text', [
            'label' => 'Price',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('description', 'textarea', [
            'label' => 'Description',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                    }

}
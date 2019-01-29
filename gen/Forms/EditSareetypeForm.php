<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditSareetypeForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->compose('Nuclear\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('saree_length', 'text', [
            'label' => 'Length',
            'help_block' => ['text' => ''],

                        'rules' => 'required|numeric',
            
            
            

        ]);
                                $this->add('saree_blouse', 'select', [
            'label' => 'Blouse piece',
            'help_block' => ['text' => ''],

            
            
            'choices' => ['Available' => 'Available', 'Not Available' => 'Not Available']
  

        ]);
                                $this->add('saree_fabric', 'text', [
            'label' => 'Fabric',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('saree_color', 'text', [
            'label' => 'Saree Color (Use comma ( ,  ) separate)',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                    }

}
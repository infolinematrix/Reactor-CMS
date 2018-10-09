<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditProductForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->compose('Nuclear\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('description', 'textarea', [
            'label' => 'Description',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            'attr' => ['rows' => 3,  'class' => 'textarea']

        ]);
                                $this->add('seller', 'text', [
            'label' => 'Seller Name',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('product_price', 'text', [
            'label' => 'Price',
            'help_block' => ['text' => ''],

                        'rules' => 'required|numeric',
            
            
            

        ]);
                                $this->add('seller_phone', 'text', [
            'label' => 'Phone Number',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('product_shipping', 'number', [
            'label' => 'Shipping',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('product_cod', 'select', [
            'label' => 'Cash on delivery',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            'choices' => [ 'cod_yes' => 'Available' ,  'cod_no' => 'Not Available']
                                    

        ]);
                                $this->add('product_stock', 'select', [
            'label' => 'In stock',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            'choices' => ['stock_yes' => 'Available', 'stock_no' => 'Not Available']
                               

        ]);
                    }

}
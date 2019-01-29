<?php


namespace ReactorCMS\Html\Forms\Nodes;


use Kris\LaravelFormBuilder\Form;

class CreateForm extends Form {

    /**
     * Form options
     *
     * @var array
     */
    protected $formOptions = [
        'method' => 'POST'
    ];

    public function buildForm()
    {
<<<<<<< HEAD
        
=======
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
        $this->compose('Reactor\Hierarchy\Http\Forms\NodeSourceForm');
        $this->add('type', 'select', ['rules' => 'required', 'inline' => true]);
    }

}
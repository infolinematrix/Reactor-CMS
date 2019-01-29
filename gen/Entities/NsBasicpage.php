<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Entities;


use Reactor\Hierarchy\NodeSourceExtension;

class NsBasicpage extends NodeSourceExtension {

    /**
     * The fillable fields for the model.
     */
<<<<<<< HEAD
    protected $fillable = ['description'];
=======
    protected $fillable = [];
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c

    /**
     * Returns the fields for the model
     */
    public static function getSourceFields()
    {
<<<<<<< HEAD
        return ['description'];
=======
        return [];
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
    }

    /**
     * Returns searchables for the model
     */
    public static function getSearchable()
    {
        return [
            'columns' => [],
            'joins' => [
                
            ]
        ];
    }

    /**
     * Returns mutatables for the model
     */
    public static function getMutatables()
    {
        return [];
    }

}
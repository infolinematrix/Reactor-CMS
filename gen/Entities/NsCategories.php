<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Entities;


use Reactor\Hierarchy\NodeSourceExtension;

class NsCategories extends NodeSourceExtension {

    /**
     * The fillable fields for the model.
     */
    protected $fillable = ['custom_form', 'icon'];

    /**
     * Returns the fields for the model
     */
    public static function getSourceFields()
    {
        return ['custom_form', 'icon'];
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
<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Entities;


use Reactor\Hierarchy\NodeSourceExtension;

class NsProduct extends NodeSourceExtension {

    /**
     * The fillable fields for the model.
     */
    protected $fillable = ['description', 'seller', 'product_price', 'seller_phone', 'product_shipping', 'product_cod', 'product_stock'];

    /**
     * Returns the fields for the model
     */
    public static function getSourceFields()
    {
        return ['description', 'seller', 'product_price', 'seller_phone', 'product_shipping', 'product_cod', 'product_stock'];
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
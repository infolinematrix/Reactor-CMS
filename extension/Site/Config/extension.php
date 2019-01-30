<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 12/10/18
 * Time: 2:35 PM
 */

return [

    'user_type' => [
        1 => 'Buyer',
        2 => 'Seller',
        3 => 'Both'
    ],

    'business_type' => [
        1 => 'Manufacturer',
        2 => 'Re-Seller'
    ],
    'payment_options' => [
        'cash' => 'Cash',
        'cheque' => 'Cheque/DD',
        'trfr' => 'Bank Transfer',
        'int' => 'International Currency',
        'cod' => 'Cash on Delivery',
    ],

    "entity" => [
        1 => 'Public Limited',
        2 => 'Private Limited',
        3 => 'Partnership',
        4 => 'Proprietorship',
        5 => 'Chartered Company',
        6 => 'Statutory Company',
        7 => 'Holding Company',
        8 => 'Subsidiary Company',
        9 => 'Non Government Organization (NGO)',
        10 => 'Not Classified',
    ],

    "working-hours" => [
        '1' => 'Monday',
        '2' => 'Tuesday',
        '3' => 'Wednesday',
        '4' => 'Thursday',
        '5' => 'Friday',
        '6' => 'Saturday',
        '7' => 'Sunday',
    ],

    'unit' => [
        'box' => 'Box',
        'litre' => 'Litre',
        'piece' => 'Piece',
        'sets' => 'Sets',
    ],

    'currecy_code' => [
        'USD' => 'USD',
        'INR' => 'INR',
    ],

    'show_price' => [

        'yes' => 'YES',
        'no' => 'NO',
    ],

    'product_image' => [

        'width' => 400,
        'height' => 266,
    ],

    'business_image' => [

        'cover_image' => [

            'width' => 850,
            'height' => 300,
        ],

        'profile_image' => [

            'width' => 180,
            'height' => 180,
        ]
    ],

    'site_logo' => [

        'width' => 180,
        'height' => 180
    ],


];

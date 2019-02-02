<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 4/4/17
 * Time: 12:42 PM
 */
use Reactor\Hierarchy\Node;

if (!function_exists('getProfileLocation')) {

    function getProfileLocation($node_id)
    {

        $node = Node::find($node_id);
        $locations = $node->getMeta('location');

        rsort($locations);
        if (count($locations) > 0) {
            $loca = '';
            foreach ($locations as $location) {

                $loca .= Node::withType('locations')->where('id', $location)->first()->getTitle() . ', ';
            }

            $length = strlen(trim($loca));
            $location = substr_replace($loca, '', $length - 1, $length);

            return $location;

        } else {


            return false;

        }
    }

    function location_array($node_id)
    {

        $node = Node::find($node_id);
        $locations = $node->getMeta('location');
        $loca = [];
        foreach ($locations as $location) {

            $loca[] = Node::withType('locations')->where('id', $location)->first()->getTitle();
        }

        return $loca;
    }

    function getSpeciality($node_id)
    {
        $node = Node::find($node_id);
        $speciality[] = $node->getMeta('category');

        $result = [];
        foreach ($speciality as $row) {

            $result[] = Node::withType('categories')->where('id', $row)->first()->getTitle();
        }

        return $result;
    }
}


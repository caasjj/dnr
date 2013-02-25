<?php
namespace DNR\Models;

class Address extends \ActiveRecord\Model
    {
        static $belongs_to = array(
            array('customer')
        );
    }
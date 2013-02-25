<?php
namespace DNR\Models;

class Customer extends \ActiveRecord\Model
    {

        static $has_one = array(
            array('address')
        );

        static $has_many = array(
            array('orders')
        );

    // Validators - must have full name and phone number
        static $validates_presence_of = array(
            array('firstname', 'lastname', 'phone')
        );
    }
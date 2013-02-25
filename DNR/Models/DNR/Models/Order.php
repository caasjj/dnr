<?php
namespace DNR\Models;

class Order extends \ActiveRecord\Model
    {

        static $belongs_to = array(
            array('customer')
        );

        static $has_many = array(
            array('orderitems'),
            array('orderoptions'),
            array('payments')
        );

    }
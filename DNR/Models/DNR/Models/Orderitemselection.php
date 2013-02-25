<?php
namespace DNR\Models;

class Orderitemselection extends \ActiveRecord\Model
    {

    // Associations
        static $belongs_to = array(
            array('orderitem')
        );

    }

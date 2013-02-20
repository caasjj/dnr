<?php
namespace DNR\Model;
class Orderitemselection extends \ActiveRecord\Model
    {

    // Associations
        static $belongs_to = array(
            array('orderitem')
        );


    }

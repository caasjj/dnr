<?php
namespace DNR\Models;

class Orderoption extends \ActiveRecord\Model
    {

        static $belongs_to = array(
            array('order')
        );

    }
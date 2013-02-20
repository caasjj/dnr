<?php
namespace DNR\Model;
class Orderoption extends \ActiveRecord\Model
    {

        static $belongs_to = array(
            array('order')
        );


    }
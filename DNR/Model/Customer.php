<?php
namespace DNR\Model;

class Customer extends \ActiveRecord\Model
    {

        static $has_many = array(
            array('orders')
        );

    // Validators - must have full name and phone number
        static $validates_presence_of = array(
            array('firstname', 'lastname', 'phone')
        );

        public function display() {

            echo 'Name:     ' . $this->firstname . ' ' . $this->lastname . PHP_EOL;
            echo 'ID:       ' . $this->id . PHP_EOL;
            echo 'Username: ' . $this->username . PHP_EOL;
            echo 'Phone:    ' . $this->phone . PHP_EOL;
        }
    }
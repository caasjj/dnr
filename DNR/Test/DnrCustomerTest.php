<?php
namespace DNR\App;

/**
 * TEST code just to make sure PHPUnit is installed.
 */
class DnrCustomerTest extends \PHPUnit_Framework_TestCase
    {
        private $customer;
        private $connection;

        function setUp() {
            $this->customer = DnrCustomer::create(array(
                firstnmae => 'John',
                lastname  => 'Doe'
            ));
        }
    }
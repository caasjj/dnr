<?php
namespace DNR\App;
use DNR\Model\Customer;

/**
 * Created by JetBrains PhpStorm.
 * User: walid
 * Date: 2/12/13
 * Time: 11:12 AM
 * To change this template use File | Settings | File Templates.
 */
class DnrCustomer
    {

        public $customer, $order, $payment;

        private function __construct() {

        }

        static function Create($p) {

            $d = new DnrCustomer();
            $d->customer = Customer::create($p);

            return $d;

        }

        public static function find_by_lastname($name) {

            $v = new DnrCustomer();
            $v->customer = Customer::find_by_lastname($name);

            return $v;

        }

        function PlaceOrder($o) {
            $v = $this->customer;
            $this->order = $v->create_order($o);
        }

        function AddToBasket() {

        }

        function RemoveFromBasket() {

        }

        function MakePayment($m) {
            $v = $this->order;
            $this->payment = $v->create_payment($m);
        }

    // Utility functions
        public function display() {

            $this->customer->display();

        }

    }
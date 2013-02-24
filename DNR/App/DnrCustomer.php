<?php
namespace DNR\App;
//use \DNR\Models\Customer;

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

            // TODO: Let something else handle the db connection (outside of Customer)
            DnrDatabase::connect('mysql://walid:mysql@localhost/DNRTest');
            $d = new DnrCustomer();

            // Grab the customer data, minus the address
            $data = $p;
            $data['password'] =
                crypt($p['password'], '$2a$10$ajHu7l3Yq.0pE4HQr19nR2');

            unset($data['street']);
            unset($data['city']);
            unset($data['state']);
            unset($data['zip']);


            $d->customer = \DNR\Models\Customer::create($data);
/*
            // Grab the address data and make the association
            $addr['street'] = $p['street']  ;
            $addr['city'] = $p['city'];
            $addr['state'] = $p['state'] ;
            $addr['zip'] = $p['zip'];

            $d->customer->create_address($addr);
            //return $d;
*/
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

        public function display() {

            echo 'Name:     ' . $this->firstname . ' ' . $this->lastname . PHP_EOL;
            echo 'ID:       ' . $this->id . PHP_EOL;
            echo 'Username: ' . $this->username . PHP_EOL;
            echo 'Phone:    ' . $this->phone . PHP_EOL;
        }

    }
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

        private $customer, $address, $order, $payment;

        public function __construct($p) {

            DnrDatabase::Connect('mysql://walid:mysql@localhost/DNRTest');

            // Grab the address data and make the association
            if (array_key_exists('street', $p) && array_key_exists('city', $p) && array_key_exists('state', $p) && array_key_exists('zip', $p)) {
                $this->address = new \DNR\Models\Address(array(
                    'street' => $p['street'],
                    'city'   => $p['city'],
                    'state'  => $p['state'],
                    'zip'    => $p['zip']
                ));
            } else {
                $this->address = array();
                $this->address->id = NULL;
            }

            $this->customer = new \DNR\Models\Customer(array(
                'firstname'  => $p['firstname'],
                'lastname'   => $p['lastname'],
                'phone'      => $p['phone'],
                'email'      => $p['email'],
                'username'   => $p['username'],
                'password'   => crypt($p['password'], '$2a$10$ajHu7l3Yq.0pE4HQr19nR2'),
                'address_id' => $this->address->id
            ));
        }

        public function Save() {

            $this->address->save();
            $this->customer->save();

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

        public function Display() {

            echo 'Name:     ' . $this->firstname . ' ' . $this->lastname . PHP_EOL;
            echo 'ID:       ' . $this->id . PHP_EOL;
            echo 'Username: ' . $this->username . PHP_EOL;
            echo 'Phone:    ' . $this->phone . PHP_EOL;
        }

    }
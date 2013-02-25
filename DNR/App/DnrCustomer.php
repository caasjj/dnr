<?php
namespace DNR\App;

use \DNR\Models\Customer;
use \DNR\Models\Address;
use \DNR\Models\Order;

class DnrCustomer
    {

        private $customer, $address, $order, $payment;

        public function __construct() {
        }


        public function Create($p) {
            // DnrDatabase::Connect('mysql://walid:mysql@localhost/DNRTest');
            if (array_key_exists('street', $p) && array_key_exists('city', $p) && array_key_exists('state', $p) && array_key_exists('zip', $p)) {
                $this->address = array(
                    'street' => $p['street'],
                    'city'   => $p['city'],
                    'state'  => $p['state'],
                    'zip'    => $p['zip']
                );
            } else {
                $this->address = array();
                $this->address->id = NULL;
            }
            $this->customer = new Customer(array(
                'firstname' => $p['firstname'],
                'lastname'  => $p['lastname'],
                'phone'     => $p['phone'],
                'email'     => $p['email'],
                'username'  => $p['username'],
                'password'  => crypt($p['password'], '$2a$10$ajHu7l3Yq.0pE4HQr19nR2')
            ));
            $this->customer->save();
            $this->customer->create_address($this->address);

        }

        function PlaceOrder($o) {
            $this->create_order(array(
                'menu_id'   => $o['menu_id'],
                'latitude'  => $o['latitude'],
                'longitude' => $o['longitude'],
                'delivery'  => $o['delivery']
            ));
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
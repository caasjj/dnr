<?php
namespace DNR\Routes;

use DNR\App\DnrCustomer;

class RouteHandler
    {

        public function HandleUserRegistration($req) {

            echo '<PRE>';
            $customer = $req;
            print_r($req);

            $customer['password'] = $req['password1'];
            unset($customer['password1']);
            unset($customer['password2']);
            print_r($customer);

            $c = new DnrCustomer($customer);
            $c->save();

        }

        public function HandleUserOrder($req) {

            echo '<PRE>';
            // TODO: remove entire section when ordering is implemented
            $req = array(
                'username'   => 'whosseini',
                'menu_id'    => 'menu_id',
                'latitude'   => '40.7',
                'longitude'  => '74.0',
                'delivery'   => 'Takeout',
                'orderitems' => array(
                    array(
                        'itemid'   => '24',
                        'quantity' => 1
                    ),
                    array(
                        'itemid'   => '13',
                        'quantity' => 5
                    )
                )
            );
            // TODO: remove from above down to here
            print_r($req);


        }

        public function HandleMenuLoader($menu_number) {

            echo '<PRE>';
            echo 'Fetching menu ' . $menu_number . PHP_EOL;

        }

    }

<?php
namespace DNR\Routes;

//use \DNR\App\DnrCustomer;
//use \Slim\Slim;

class RouteHandler
    {

        public function HandleUserRegistration($reg) {

            echo '<PRE>';
            $customer = $reg;
            print_r($reg);

            $customer['password'] = $reg['password1'];
            unset($customer['password1']);
            unset($customer['password2']);
            print_r($customer);

            \DNR\App\DnrCustomer::Create($customer);


        }

        public function HandleMenuLoader($menu_number) {

            echo 'Fetching menu ' . $menu_number . PHP_EOL;
            silly('And calling a silly function!');

        }

    }

function silly($msg) {
    echo $msg . PHP_EOL;
}
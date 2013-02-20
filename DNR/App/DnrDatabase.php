<?php
namespace DNR\App;

require_once '../vendor/php-activerecord/ActiveRecord.php';

class DnrDatabase
    {

        public static function connect($connection) {

            $modeldir = '../../';

            if (!file_exists($modeldir)) {

                die('Model directory does not exist!');

            }
           // echo 'Model dir: ' . $modeldir . '<BR>';
            $cfg = \ActiveRecord\Config::instance();
            $cfg->set_model_directory($modeldir);
            //echo 'Connection is:' . $connection;
            $cfg->set_connections(array('development' => $connection));

        }
    }

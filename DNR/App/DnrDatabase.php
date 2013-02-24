<?php
namespace DNR\App;

class DnrDatabase
    {

        public static function connect($connection) {

            $modeldir = '../DNR/Models';
            echo realpath($modeldir);
            if (!file_exists($modeldir)) {

                die('Models directory does not exist!');

            }
           // echo 'Models dir: ' . $modeldir . '<BR>';
            $cfg = \ActiveRecord\Config::instance();
            $cfg->set_model_directory($modeldir);
            //echo 'Connection is:' . $connection;
            $cfg->set_connections(array('development' => $connection));

        }
    }

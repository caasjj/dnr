<?php
namespace DNR\App;

use DNR\Routes as Routes;
use DNR\MiddleWare as MWare;

class DnrApplication
    {
        private $app = NULL;
        private static $pp = NULL;

        private function __construct() {

            // Prepare app
            $this->app = new \Slim\Slim(array(
                'templates.path' => '../templates',
                'log.level'      => 4,
                'log.enabled'    => TRUE,
                'log.writer'     => new \Slim\Extras\Log\DateTimeFileWriter(array(
                    'path'        => '../logs',
                    'name_format' => 'y-m-d'
                ))
            ));

            //$this->app->add(new MWare\UpperCase());

        }

        private function __clone() {
        }

        final public static function Create() {
            if (!isset(self::$pp)) {
                self::$pp = new DnrApplication();
                self::$pp->CreateView();

                return self::$pp;
            } else {
                return self::$pp;
            }
        }

        private function CreateView() {
            // Prepare view
            \Slim\Extras\Views\Twig::$twigOptions = array(
                'charset'          => 'utf-8',
                'cache'            => realpath('../templates/cache'),
                'auto_reload'      => TRUE,
                'strict_variables' => FALSE,
                'autoescape'       => TRUE
            );
            $this->app->view(new \Slim\Extras\Views\Twig());
        }

        public function CreateRoutes() {

            $q = $this->app;

            $q->get('/', function () use ($q) {
                $q->render('register.html');
            });

            $q->post('/register', function () use ($q) {
                $req = $q->request();
                echo '<PRE>';
                print_r($req->params());
            });

        }

        public function ConnectDatabase() {
            DnrDatabase::connect('mysql://walid:mysql@localhost/DNRTest');
        }

        public function run() {

            $this->app->run();
        }
    }



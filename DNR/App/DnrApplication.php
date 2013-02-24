<?php
namespace DNR\App;

//use \DNR\Routes;

class DnrApplication
    {
        private $app = NULL;

        public function __construct() {

            $this->CreateApp();
            $this->CreateView();
            $this->CreateRoutes();

        }

        private function CreateApp() {

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

        }

        private function CreateView() {

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

            $j = new \DNR\Routes\RouteHandler();

            $q = $this->app;

            $q->get('/', function () use ($q) {

                //echo 'Loaded!';
                $q->render('register.html');

            });

            $q->get('/menu/:d', function ($d) use ($q, $j) {

                $j->HandleMenuLoader($d);

            });

            $q->post('/register', function () use ($q, $j) {


                $j->HandleUserRegistration( $q->request()->params()) ;

            });

        }

        public function ConnectDatabase() {
            // TODO: Move connection details to a configuration file, remove user/pass from source control
            DnrDatabase::connect('mysql://walid:mysql@localhost/DNRTest');
        }

        public function run() {

            $this->app->run();

        }
    }



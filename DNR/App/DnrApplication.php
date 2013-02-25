<?php
namespace DNR\App;

use \DNR\Routes\RouteHandler;
use \DNR\App\DnrDatabase;

class DnrApplication
    {
        private $app = NULL;

        public function __construct() {
            $this->CreateApp();
            $this->CreateView();
            $this->CreateRoutes();
            $this->ConnectDatabase();
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

        private function ConnectDatabase() {
            $fname = '../dbcreds';
            $fid = fopen('../dbcreds', 'r');
            $creds = fread($fid, filesize($fname));
            DnrDatabase::Connect($creds);
        }

        public function CreateRoutes() {
            $handler = new RouteHandler();
            $application = $this->app;
            $application->get('/', function () use ($application) {
                $application->render('register.html');
            });
            $application->get('/menu/:d', function ($d) use ($application, $handler) {
                $handler->HandleMenuLoader($d);
            });
            $application->post('/register', function () use ($application, $handler) {
                $handler->HandleUserRegistration($application->request()->params());
            });
            // Todo - Change this /order route to a POST.  GET only for quick testing of ActiveRecord.
            $application->get('/order', function () use ($application, $handler) {
                $handler->HandleUserOrder($application->request()->params());
            });
            $application->get('/delete/:id', function ($id) use ($application, $handler) {
                $handler->HandleUserDelete($id);
            });
        }

        public function Run() {
            $this->app->run();
        }
    }



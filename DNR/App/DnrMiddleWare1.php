<?php
namespace DNR\App;
class DnrMiddleware1 extends \Slim\Middleware
{
public function call()
{
//The Slim application
$app = $this->app;

//The Environment object
$env = $app->environment();

//The Request object
$req = $app->request();

//The Response object
$res = $app->response();
}
}
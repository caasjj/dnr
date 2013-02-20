<?php
namespace DNR\App;

require_once '../vendor/autoload.php';

$app = DnrApplication::Create();
$app->CreateRoutes();
$app->run();
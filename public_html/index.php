<?php
namespace DNR\App;

require_once '../vendor/autoload.php';
require_once '../vendor/php-activerecord/ActiveRecord.php';

$app = new DnrApplication();
$app->run();
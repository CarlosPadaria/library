<?php

require '../vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();

$routes = require '../Library/Routes/routes.php';

$routes($app);

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->run();

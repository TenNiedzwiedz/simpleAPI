<?php

declare(strict_types=1);

use app\core\Application;
use app\controllers\UsersController;

require_once __DIR__ . '/../app/vendor/autoload.php';

$app = new Application(dirname(__DIR__) . '/app');

$app->router->route('/users', UsersController::class);

$app->run();

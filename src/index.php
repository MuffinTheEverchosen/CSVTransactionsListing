<?php

use classes\App;
use classes\IndexController;
use classes\Router;
use classes\FormController;
use classes\TransactionHandler;

require __DIR__ . '/../vendor/autoload.php';

const VIEW_PATH = __DIR__ . '/view';
const TEMP_PATH = __DIR__ . '/temp';

$router = new Router();

$router
    ->register('/', [IndexController::class, 'index'])
    ->post('/submittedFile', [FormController::class, 'submittedFile'])
    ->post('/submittedRow', [FormController::class, 'submittedRow'])
    ->post('/deleted', [FormController::class, 'deleted'])
    ->register(['/upload'], [IndexController::class, 'upload'])
    ->register(['/delete'], [IndexController::class, 'delete'])
    ->register(['/list'], [IndexController::class, 'list'])
    ->register(['/error404'], [IndexController::class, 'index']);

(new APP($router, [
    'uri' => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD']
]))->run();
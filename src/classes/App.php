<?php

namespace classes;

use classes\exceptions\RouteNotFoundException;
use PDO;
use PDOException;

class App
{
    private static PDO $db;
    public function __construct(protected Router $router, protected array $request)
    {
        try {
            static::$db = new PDO(
                'mysql:host=db;dbname=db;', 'db', 'db'
            );
        } catch (PDOException $exception){
            throw new PDOException($exception->getMessage(), (int)$exception->getCode());
        }
    }

    public static function db(): PDO
    {
        return static::$db;
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve(
                $this->request['uri'],
                $this->request['method']
            );
        } catch (RouteNotFoundException) {
            http_response_code(404);

            echo View::make('error/404');
        }
    }


}
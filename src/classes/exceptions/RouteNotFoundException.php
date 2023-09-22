<?php

namespace classes\exceptions;

class RouteNotFoundException extends \Exception //do zastąpienia \ importem klasy exception: use Exception;
{
    protected $message = '404 Not Found';

}
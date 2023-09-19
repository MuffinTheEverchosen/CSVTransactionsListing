<?php

namespace classes\exceptions;

class ViewNotFoundException extends \Exception //do zastąpienia \ importem klasy exception: use Exception;
{
    protected $message = 'View not found';
}
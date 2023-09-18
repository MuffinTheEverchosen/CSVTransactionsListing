<?php

namespace classes\exceptions;

class ViewNotFoundException extends \Exception
{
    protected $message = 'View not found';
}
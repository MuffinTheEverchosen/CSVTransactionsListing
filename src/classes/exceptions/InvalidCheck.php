<?php

namespace classes\exceptions;

class InvalidCheck extends \Exception
{
    public function getViewFile(): string
    {
        return 'error/invalidCheck';
    }
}
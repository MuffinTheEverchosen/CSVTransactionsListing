<?php

namespace classes\exceptions;

class InvalidCheck extends \Exception //do zastąpienia \ importem klasy exception: use Exception;
{
    public function getViewFile(): string
    {
        return 'error/invalidCheck';
    }
}
<?php

namespace classes\exceptions;

class InvalidTimeType extends \Exception //do zastąpienia \ importem klasy exception: use Exception;
{
    public function getViewFile(): string
    {
        return 'error/invalidTimeType';
    }
}
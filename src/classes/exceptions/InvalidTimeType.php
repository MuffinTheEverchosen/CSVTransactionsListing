<?php

namespace classes\exceptions;

class InvalidTimeType extends \Exception
{
    public function getViewFile(): string
    {
        return 'error/invalidTimeType';
    }
}
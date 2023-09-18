<?php

namespace classes\exceptions;

class TooLongNumber extends \Exception
{
    public function getViewFile(): string
    {
        return 'error/tooLongNumber';
    }
}
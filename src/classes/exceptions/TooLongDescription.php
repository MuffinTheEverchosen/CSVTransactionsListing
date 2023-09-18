<?php

namespace classes\exceptions;

class TooLongDescription extends \Exception
{
    public function getViewFile(): string
    {
        return 'error/tooLongDescription';
    }
}
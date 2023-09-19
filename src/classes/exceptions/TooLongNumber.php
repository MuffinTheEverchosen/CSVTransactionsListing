<?php

namespace classes\exceptions;

class TooLongNumber extends \Exception //do zastąpienia \ importem klasy exception: use Exception;
{
    public function getViewFile(): string
    {
        return 'error/tooLongNumber';
    }
}
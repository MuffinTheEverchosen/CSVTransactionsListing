<?php

namespace classes\exceptions;

class TooLongDescription extends \Exception //do zastąpienia \ importem klasy exception: use Exception;
{
    public function getViewFile(): string
    {
        return 'error/tooLongDescription';
    }
}
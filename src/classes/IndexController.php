<?php

namespace classes;

use Latte\Engine; //Zbędny import

class IndexController // brak phpdoc przed funkcjami
{
    public function index(): View
    {
        return View::make('index');
    }
    public function upload(): View
    {
        return View::make('upload');
    }
    public function delete(): View
    {
        return View::make('delete');
    }
    public function list(): View
    {
        return View::make('list');
    }
}
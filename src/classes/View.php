<?php

namespace classes;

use classes\exceptions\ViewNotFoundException;
use Latte\Engine;

class View
{
    protected bool $error;

    public function __construct(protected string $view)
    {
    }

    public static function make(string $view): static
    {
        return new static($view);
    }

    /**
     * @throws ViewNotFoundException
     */
    public function render(): string
    {
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';
        $layoutFile = VIEW_PATH . '/template/layout.php';

        if (! file_exists($viewPath))
        {
            throw new ViewNotFoundException;
        }

        ob_start();

        include $layoutFile;

        return (string) ob_get_clean();

    }

    /**
     * @throws ViewNotFoundException
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
<?php

namespace classes;

use classes\exceptions\ViewNotFoundException;
use Latte\Engine; //zbędny import

class View //brak phpdoc przed większością funkcji i property
{
    protected bool $error; //nazwa przy zmiennej bool powinna być w formie $isError

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

        if (! file_exists($viewPath)) //nie powinno być spacji między wykrzyknikiem a funkcją
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
<?php

declare(strict_types=1);

namespace sandbox;

class Autoloader
{
    protected array $dir;
    protected array $prefix;

    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($class)
    {
        require implode('/', array_merge($this->dir,
                array_diff(explode('\\', $class), $this->prefix))) . '.php';
    }

    public function addNamespace(string $prefix, string $dir)
    {
        $this->prefix = explode('\\', $prefix);
        $this->dir = explode('/', $dir);
    }
}

$autoloader = new Autoloader();
$autoloader->addNamespace('App', __DIR__ . '/../src');
$autoloader->register();

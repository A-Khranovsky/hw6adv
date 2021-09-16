<?php

declare(strict_types=1);

namespace sandbox;

class Autoloader
{
    protected array $map;

    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($class)
    {
        $file = null;
        foreach ($this->map as $prefix => $dir) {
            $file = implode('/', array_merge(explode('/', $dir),
                    array_diff(explode('\\', $class), explode('\\', $prefix)))) . '.php';
            if (file_exists($file)) {
                include $file;
            }
        }
    }

    public function addNamespace(string $prefix, string $dir)
    {
        $this->map[$prefix] = $dir;
    }
}

$autoloader = new Autoloader();
$autoloader->addNamespace('App', __DIR__ . '/../src');
$autoloader->addNamespace('Model', __DIR__ . '/../Model');
$autoloader->register();

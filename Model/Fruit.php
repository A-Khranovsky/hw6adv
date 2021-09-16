<?php

declare(strict_types=1);

namespace Model;

class Fruit
{
    private string $Name;

    public function __construct(string $name)
    {
        $this->setName($name);
    }

    private function setName(string $name): void
    {
        $this->Name = $name;
    }

    public function getName(): string
    {
        return $this->Name;
    }
}

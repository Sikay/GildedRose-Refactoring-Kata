<?php

namespace GildedRose;

class Sulfuras extends Item
{
    public function __construct(string $name, int $sell_in, int $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}
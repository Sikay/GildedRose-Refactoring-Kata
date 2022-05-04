<?php

namespace GildedRose;

class Sulfuras extends Item
{
    public function __construct(string $name, int $sellIn, ItemQuality $quality)
    {
        parent::__construct($name, $sellIn, $quality);
    }

    public function update(): void
    {
        // Nothing to implement.
    }
}
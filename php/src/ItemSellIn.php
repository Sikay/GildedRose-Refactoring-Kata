<?php

namespace GildedRose;

use phpDocumentor\Reflection\Types\Boolean;

class ItemSellIn
{
    private int $sellIn;

    public function __construct(int $sellIn)
    {
        $this->sellIn = $sellIn;
    }

    public function show(): int
    {
        return $this->sellIn;
    }

    public function decrease(): self
    {
        return new self($this->sellIn - 1);
    }

    public function isLessThan(int $days): bool
    {
        return $this->sellIn < $days;
    }
}
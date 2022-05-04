<?php

namespace GildedRose;

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
}
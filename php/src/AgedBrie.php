<?php

namespace GildedRose;

class AgedBrie extends Item
{
    public function __construct(string $name, ItemSellIn $sellIn, ItemQuality $quality)
    {
        parent::__construct($name, $sellIn, $quality);
    }

    public function update(): void
    {
        $this->increaseQuality();
        $this->decreaseSellIn();
        if ($this->sellIn() < self::SELL_IN_EXPIRES) {
            $this->increaseQuality();
        }
    }
}
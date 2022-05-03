<?php

namespace GildedRose;

class AgedBrie extends Item
{
    public function __construct(string $name, int $sellIn, int $quality)
    {
        parent::__construct($name, $sellIn, $quality);
    }

    public function update()
    {
        $this->increaseQuality();
        $this->decreaseSellIn();
        if ($this->sellIn < self::SELL_IN_EXPIRES) {
            $this->increaseQuality();
        }
    }
}
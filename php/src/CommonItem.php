<?php

namespace GildedRose;

class CommonItem extends Item
{
    public function __construct(string $name, int $sellIn, int $quality)
    {
        parent::__construct($name, $sellIn, $quality);
    }

    public function update(): void
    {
        $this->decreaseQuality();
        $this->decreaseSellIn();
        if ($this->sellIn < self::SELL_IN_EXPIRES) {
            $this->decreaseQuality();
        }
    }
}
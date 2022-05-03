<?php

namespace GildedRose;

class AgedBrie extends Item
{
    public function __construct(string $name, int $sell_in, int $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    public function update()
    {
        $this->increaseQuality();
        $this->decreaseSellIn();
        if ($this->sell_in < self::SELL_IN_EXPIRES) {
            $this->increaseQuality();
        }
    }
}
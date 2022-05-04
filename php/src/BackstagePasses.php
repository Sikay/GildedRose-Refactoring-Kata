<?php

namespace GildedRose;

class BackstagePasses extends Item
{
    private const BACKSTAGE_PASSES_TEN_DAYS_TREATMENT = 10;
    private const BACKSTAGE_PASSES_FIVE_DAYS_TREATMENT = 5;

    public function __construct(string $name, ItemSellIn $sellIn, ItemQuality $quality)
    {
        parent::__construct($name, $sellIn, $quality);
    }

    public function update(): void
    {
        $this->decreaseSellIn();
        $this->increaseQuality();

        if ($this->sellInIsLessThan(self::BACKSTAGE_PASSES_TEN_DAYS_TREATMENT)) {
            $this->increaseQuality();
        }

        if ($this->sellInIsLessThan(self::BACKSTAGE_PASSES_FIVE_DAYS_TREATMENT)) {
            $this->increaseQuality();
        }

        if ($this->sellInIsLessThan(self::SELL_IN_EXPIRES)) {
            $this->resetQuality();
        }
    }
}
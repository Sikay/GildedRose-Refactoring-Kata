<?php

namespace GildedRose;

class BackstagePasses extends Item
{
    private const BACKSTAGE_PASSES_TEN_DAYS_TREATMENT = 10;
    private const BACKSTAGE_PASSES_FIVE_DAYS_TREATMENT = 5;

    public function __construct(string $name, int $sellIn, int $quality)
    {
        parent::__construct($name, $sellIn, $quality);
    }

    public function update()
    {
        $this->increaseQuality();

        if ($this->sellIn <= self::BACKSTAGE_PASSES_TEN_DAYS_TREATMENT) {
            $this->increaseQuality();
        }
        if ($this->sellIn <= self::BACKSTAGE_PASSES_FIVE_DAYS_TREATMENT) {
            $this->increaseQuality();
        }

        $this->decreaseSellIn();

        if ($this->sellIn < self::SELL_IN_EXPIRES) {
            $this->resetQuality();
        }
    }
}
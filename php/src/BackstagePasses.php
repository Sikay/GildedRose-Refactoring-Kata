<?php

namespace GildedRose;

class BackstagePasses extends Item
{
    private const BACKSTAGE_PASSES_TEN_DAYS_TREATMENT = 10;
    private const BACKSTAGE_PASSES_FIVE_DAYS_TREATMENT = 5;

    public function __construct(string $name, int $sell_in, int $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    public function update()
    {
        $this->increaseQuality();

        if ($this->sell_in <= self::BACKSTAGE_PASSES_TEN_DAYS_TREATMENT) {
            $this->increaseQuality();
        }
        if ($this->sell_in <= self::BACKSTAGE_PASSES_FIVE_DAYS_TREATMENT) {
            $this->increaseQuality();
        }

        $this->decreaseSellIn();

        if ($this->sell_in < self::SELL_IN_EXPIRES) {
            $this->quality = $this->quality - $this->quality;
        }
    }
}
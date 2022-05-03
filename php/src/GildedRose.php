<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    private const AGED_BRIE = 'Aged Brie';
    private const BACKSTAGE_PASSES = 'Backstage passes to a TAFKAL80ETC concert';
    private const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';

    private const BACKSTAGE_PASSES_TEN_DAYS_TREATMENT = 10;
    private const BACKSTAGE_PASSES_FIVE_DAYS_TREATMENT = 5;

    private const SELL_IN_EXPIRES = 0;

    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {

            switch ($item->name) {
                case self::AGED_BRIE:
                    $item->decreaseSellIn();
                    $item->increaseQuality();

                    if ($item->sell_in < self::SELL_IN_EXPIRES) {
                        $item->increaseQuality();
                    }
                    break;
                case self::BACKSTAGE_PASSES:
                    $item->decreaseSellIn();
                    $item->increaseQuality();

                    if ($item->sell_in <= self::BACKSTAGE_PASSES_TEN_DAYS_TREATMENT) {
                        $item->increaseQuality();
                    }

                    if ($item->sell_in <= self::BACKSTAGE_PASSES_FIVE_DAYS_TREATMENT) {
                        $item->increaseQuality();
                    }

                    if ($item->sell_in < self::SELL_IN_EXPIRES) {
                        $item->quality = $item->quality - $item->quality;
                    }
                    break;
                case self::SULFURAS_HAND_OF_RAGNAROS:
                    break;
                default:
                    $item->decreaseSellIn();
                    $item->decreaseQuality();

                    if ($item->sell_in < self::SELL_IN_EXPIRES) {
                        $item->decreaseQuality();
                    }
            }
        }
    }
}

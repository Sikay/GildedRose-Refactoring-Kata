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

    private const MIN_QUALITY = 0;
    private const MAX_QUALITY = 50;

    private const SELL_IN_EXPIRES = 0;

    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name != self::AGED_BRIE and $item->name != self::BACKSTAGE_PASSES) {
                if ($item->quality > self::MIN_QUALITY) {
                    if ($item->name != self::SULFURAS_HAND_OF_RAGNAROS) {
                        $this->decreaseQuality($item);
                    }
                }
            } else {
                if ($item->quality < self::MAX_QUALITY) {
                    $this->increaseQuality($item);
                    if ($item->name == self::BACKSTAGE_PASSES) {
                        if ($item->sell_in <= self::BACKSTAGE_PASSES_TEN_DAYS_TREATMENT) {
                            if ($item->quality < self::MAX_QUALITY) {
                                $this->increaseQuality($item);
                            }
                        }
                        if ($item->sell_in <= self::BACKSTAGE_PASSES_FIVE_DAYS_TREATMENT) {
                            if ($item->quality < self::MAX_QUALITY) {
                                $this->increaseQuality($item);
                            }
                        }
                    }
                }
            }

            if ($item->name != self::SULFURAS_HAND_OF_RAGNAROS) {
                $this->decreaseSellIn($item);
            }

            if ($item->sell_in < self::SELL_IN_EXPIRES) {
                if ($item->name != self::AGED_BRIE) {
                    if ($item->name != self::BACKSTAGE_PASSES) {
                        if ($item->quality > self::MIN_QUALITY) {
                            if ($item->name != self::SULFURAS_HAND_OF_RAGNAROS) {
                                $this->decreaseQuality($item);
                            }
                        }
                    } else {
                        $item->quality = $item->quality - $item->quality;
                    }
                } else {
                    if ($item->quality < self::MAX_QUALITY) {
                        $this->increaseQuality($item);
                    }
                }
            }
        }
    }

    private function decreaseQuality($item): void
    {
        $item->quality = $item->quality - 1;
    }

    private function increaseQuality($item): void
    {
        $item->quality = $item->quality + 1;
    }

    private function decreaseSellIn($item): void
    {
        $item->sell_in = $item->sell_in - 1;
    }
}

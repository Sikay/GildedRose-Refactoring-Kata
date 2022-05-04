<?php

namespace GildedRose;

final class ItemFactory
{
    private const AGED_BRIE = 'Aged Brie';
    private const BACKSTAGE_PASSES = 'Backstage passes to a TAFKAL80ETC concert';
    private const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';

    public static function createItem(string $name, int $sellIn, int $quality): Item
    {
        $itemSellIn = new ItemSellIn($sellIn);
        $itemQuality = new ItemQuality($quality);

        if ($name === self::AGED_BRIE) {
            return new AgedBrie($name, $itemSellIn, $itemQuality);
        }

        if ($name === self::BACKSTAGE_PASSES) {
            return new BackstagePasses($name, $itemSellIn, $itemQuality);
        }

        if ($name === self::SULFURAS_HAND_OF_RAGNAROS) {
            return new Sulfuras($name, $itemSellIn, $itemQuality);
        }

        return new CommonItem($name, $itemSellIn, $itemQuality);
    }
}
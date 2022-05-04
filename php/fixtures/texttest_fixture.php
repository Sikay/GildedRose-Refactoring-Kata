<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use GildedRose\AgedBrie;
use GildedRose\BackstagePasses;
use GildedRose\CommonItem;
use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\Sulfuras;

echo 'OMGHAI!' . PHP_EOL;

$items = [
    new CommonItem('+5 Dexterity Vest', 10, 20),
    new AgedBrie('Aged Brie', 2, 0),
    new CommonItem('Elixir of the Mongoose', 5, 7),
    new Sulfuras('Sulfuras, Hand of Ragnaros', 0, 80),
    new Sulfuras('Sulfuras, Hand of Ragnaros', -1, 80),
    new BackstagePasses('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    new BackstagePasses('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    new BackstagePasses('Backstage passes to a TAFKAL80ETC concert', 5, 49),
    // this conjured item does not work properly yet
    new CommonItem('Conjured Mana Cake', 3, 6),
];

$app = new GildedRose($items);

$days = 2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}

for ($i = 0; $i < $days; $i++) {
    echo "-------- day ${i} --------" . PHP_EOL;
    echo 'name, sellIn, quality' . PHP_EOL;
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->updateQuality();
}

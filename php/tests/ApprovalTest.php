<?php

namespace Tests;

use ApprovalTests\Approvals;
use GildedRose\AgedBrie;
use GildedRose\BackstagePasses;
use GildedRose\CommonItem;
use GildedRose\GildedRose;
use GildedRose\Sulfuras;
use PHPStan\Testing\TestCase;

class ApprovalTest extends TestCase
{
    public function testTestFixture(): void
    {
        $output = 'OMGHAI!' . PHP_EOL;

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

        $days = 31;

        for ($i = 0; $i < $days; $i++) {
            $output .= "-------- day ${i} --------" . PHP_EOL;
            $output .= 'name, sellIn, quality' . PHP_EOL;
            foreach ($items as $item) {
                $output .= $item . PHP_EOL;
            }
            $output .= PHP_EOL;
            $app->updateQuality();
        }
        Approvals::verifyString($output);
    }
}
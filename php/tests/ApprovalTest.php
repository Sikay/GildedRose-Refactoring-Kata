<?php

namespace Tests;

use ApprovalTests\Approvals;
use GildedRose\GildedRose;
use GildedRose\ItemFactory;
use PHPStan\Testing\TestCase;

class ApprovalTest extends TestCase
{
    public function testTestFixture(): void
    {
        $output = 'OMGHAI!' . PHP_EOL;

        $items = [
            ItemFactory::createItem('+5 Dexterity Vest', 10, 20),
            ItemFactory::createItem('Aged Brie', 2, 0),
            ItemFactory::createItem('Elixir of the Mongoose', 5, 7),
            ItemFactory::createItem('Sulfuras, Hand of Ragnaros', 0, 80),
            ItemFactory::createItem('Sulfuras, Hand of Ragnaros', -1, 80),
            ItemFactory::createItem('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            ItemFactory::createItem('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            ItemFactory::createItem('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            // this conjured item does not work properly yet
            ItemFactory::createItem('Conjured Mana Cake', 3, 6),
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
<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\AgedBrie;
use GildedRose\BackstagePasses;
use GildedRose\CommonItem;
use GildedRose\GildedRose;
use GildedRose\ItemFactory;
use GildedRose\Sulfuras;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /** @test */
    public function should_decrease_quality_when_pass_a_day(): void
    {
        $item = ItemFactory::createItem('+5 Dexterity Vest', 10, 20);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(19, $item->quality());
    }

    /** @test */
    public function should_decrease_sell_in_when_pass_a_day(): void
    {
        $item = ItemFactory::createItem('+5 Dexterity Vest', 10, 20);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(9, $item->sellIn());
    }

    /** @test */
    public function should_decrease_double_quality_when_pass_a_day_with_sell_in_expires(): void
    {
        $item = ItemFactory::createItem('+5 Dexterity Vest', 0, 20);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(18, $item->quality());
    }

    /** @test */
    public function should_not_decrease_quality_under_zero(): void
    {
        $item = ItemFactory::createItem('+5 Dexterity Vest', 10, 0);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(0, $item->quality());
    }

    /** @test */
    public function should_increase_aged_brie_quality_when_pass_a_day(): void
    {
        $item = ItemFactory::createItem('Aged Brie', 6, 14);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(15, $item->quality());
    }

    /** @test */
    public function should_increase_double_aged_brie_quality_when_pass_a_day_with_sell_in_expires(): void
    {
        $item = ItemFactory::createItem('Aged Brie', -2, 14);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(16, $item->quality());
    }

    /** @test */
    public function should_not_increase_quality_over_fifty(): void
    {
        $item = ItemFactory::createItem('Aged Brie', -2, 50);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(50, $item->quality());
    }

    /** @test */
    public function should_not_change_quality_for_legendary_item(): void
    {
        $item = ItemFactory::createItem('Sulfuras, Hand of Ragnaros', 0, 80);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(80, $item->quality());
    }

    /** @test */
    public function should_not_change_sell_in_for_legendary_item(): void
    {
        $item = ItemFactory::createItem('Sulfuras, Hand of Ragnaros', 0, 80);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(0, $item->sellIn());
    }

    /** @test */
    public function should_increase_backstage_passes_quality_when_pass_a_day_with_sell_in_over_ten(): void
    {
        $item = ItemFactory::createItem('Backstage passes to a TAFKAL80ETC concert', 11, 10);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(11, $item->quality());
    }

    /** @test */
    public function should_increase_double_backstage_passes_quality_when_pass_a_day_with_sell_in_under_ten(): void
    {
        $item = ItemFactory::createItem('Backstage passes to a TAFKAL80ETC concert', 10, 17);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(19, $item->quality());
    }

    /** @test */
    public function should_increase_triple_backstage_passes_quality_when_pass_a_day_with_sell_in_under_five(): void
    {
        $item = ItemFactory::createItem('Backstage passes to a TAFKAL80ETC concert', 5, 25);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(28, $item->quality());
    }

    /** @test */
    public function should_decrease_backstage_passes_quality_to_zero_when_pass_a_day_with_sell_in_expires(): void
    {
        $item = ItemFactory::createItem('Backstage passes to a TAFKAL80ETC concert', 0, 20);
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(0, $item->quality());
    }
}

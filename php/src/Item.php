<?php

declare(strict_types=1);

namespace GildedRose;

abstract class Item
{
    private const MIN_QUALITY = 0;
    private const MAX_QUALITY = 50;

    protected const SELL_IN_EXPIRES = 0;

    public string $name;
    public int $sellIn;
    public int $quality;

    public function __construct(string $name, int $sellIn, int $quality)
    {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    abstract function update(): void;

    public function name(): string
    {
        return $this->name;
    }

    public function sellIn(): int
    {
        return $this->sellIn;
    }

    public function quality(): int
    {
        return $this->quality;
    }

    protected function decreaseQuality(): void
    {
        if ($this->quality > self::MIN_QUALITY) {
            $this->quality = $this->quality - 1;
        }
    }

    protected function increaseQuality(): void
    {
        if ($this->quality < self::MAX_QUALITY) {
            $this->quality = $this->quality + 1;
        }
    }

    protected function resetQuality(): void
    {
        $this->quality -= $this->quality;
    }

    protected function decreaseSellIn(): void
    {
        $this->sellIn = $this->sellIn - 1;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }
}

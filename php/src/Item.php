<?php

declare(strict_types=1);

namespace GildedRose;

final class Item
{
    private const MIN_QUALITY = 0;
    private const MAX_QUALITY = 50;

    public string $name;
    public int $sell_in;
    public int $quality;

    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function sellIn(): int
    {
        return $this->sell_in;
    }

    public function quality(): int
    {
        return $this->quality;
    }

    public function decreaseQuality(): void
    {
        if ($this->quality > self::MIN_QUALITY) {
            $this->quality = $this->quality - 1;
        }
    }

    public function increaseQuality(): void
    {
        if ($this->quality < self::MAX_QUALITY) {
            $this->quality = $this->quality + 1;
        }
    }

    public function decreaseSellIn(): void
    {
        $this->sell_in = $this->sell_in - 1;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}

<?php

declare(strict_types=1);

namespace GildedRose;

abstract class Item
{
    protected const SELL_IN_EXPIRES = 0;

    public string $name;
    public int $sellIn;
    public ItemQuality $quality;

    public function __construct(string $name, int $sellIn, ItemQuality $quality)
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
        return $this->quality->show();
    }

    protected function decreaseQuality(): void
    {
        $this->quality = $this->quality->decrease();
    }

    protected function increaseQuality(): void
    {
        $this->quality = $this->quality->increase();
    }

    protected function resetQuality(): void
    {
        $this->quality = $this->quality->reset();
    }

    protected function decreaseSellIn(): void
    {
        $this->sellIn = $this->sellIn - 1;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality->show()}";
    }
}

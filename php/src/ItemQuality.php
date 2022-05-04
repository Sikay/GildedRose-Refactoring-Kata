<?php

namespace GildedRose;

class ItemQuality
{
    private const MIN_QUALITY = 0;
    private const MAX_QUALITY = 50;

    private int $quality;

    public function __construct(int $quality)
    {
        $this->quality = $quality;
    }

    public function show(): int
    {
        return $this->quality;
    }

    public function decrease(): self
    {
        if ($this->quality > self::MIN_QUALITY) {
            return new self($this->quality - 1);
        }

        return $this;
    }

    public function increase(): self
    {
        if ($this->quality < self::MAX_QUALITY) {
            return new self($this->quality + 1);
        }

        return $this;
    }

    public function reset(): self
    {
        return new self($this->quality - $this->quality);
    }
}
<?php

namespace Isurance\OOProgramming\Product;

class Product
{
    /** @var string */
    private $title;
    /** @var string */
    private $link;
    /** @var string */
    private $pubDate;

    public function __construct(string $title, string $link, string $pubDate)
    {
        $this->title = $title;
        $this->link = $link;
        $this->pubDate = $pubDate;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function link(): string
    {
        return $this->link;
    }

    public function pubDate(): string
    {
        return $this->pubDate;
    }
}
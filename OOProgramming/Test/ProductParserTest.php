<?php

namespace Isurance\OOProgramming\Test;

use Isurance\OOProgramming\Exception\CorruptedFileException;
use Isurance\OOProgramming\Exception\ParserFileNotFoundException;
use Isurance\OOProgramming\Parser\ProductParser;
use Isurance\OOProgramming\Product\Product;
use PHPUnit\Framework\TestCase;

class ProductParserTest extends TestCase
{
    /** @var ProductParser */
    private $productParser;

    protected function setUp()
    {
        parent::setUp();
        $this->productParser = new ProductParser('/var/www/html/OOProgramming/products.xml');
    }

    public function testParserFailsBecauseTheFileDoesNotExists()
    {
        self::expectException(ParserFileNotFoundException::class);
        $productParser = new ProductParser('NOT_EXISTS.xml');
        $productParser->parse();
    }

    public function testParserFailsBecauseTheFileIsEmpty()
    {
        self::expectException(CorruptedFileException::class);
        $productParser = new ProductParser('/var/www/html/OOProgramming/Test/empty.xml');
        $productParser->parse();
    }

    public function testParserFailsBecauseTheFileIsCorrupted()
    {
        self::expectException(CorruptedFileException::class);
        $productParser = new ProductParser('/var/www/html/OOProgramming/Test/corrupted.xml');
        $productParser->parse();
    }

    public function testParserWorksWithNoIssuesAndReturnsData()
    {
        $products = $this->productParser->parse();
        self::assertInstanceOf(Product::class, $products[0]);
    }
}

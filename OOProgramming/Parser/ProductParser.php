<?php

namespace Isurance\OOProgramming\Parser;

use Isurance\OOProgramming\Exception\CorruptedFileException;
use Isurance\OOProgramming\Exception\ParserFileNotFoundException;
use Isurance\OOProgramming\Logger\ErrorLogger;
use Isurance\OOProgramming\Logger\InfoLogger;
use Isurance\OOProgramming\Product\Product;
use SimpleXMLElement;

class ProductParser extends FeedParserBase
{
    private const ERROR_OBSERVER_EVENT = 'ERROR_OBSERVER_EVENT';
    private const INFO_OBSERVER_EVENT = 'INFO_OBSERVER_EVENT';


    public function __construct(string $strFeedUrl)
    {
        parent::__construct($strFeedUrl);
    }

    public function attachObservers()
    {
        $this->addObserver(new ErrorLogger(), self::ERROR_OBSERVER_EVENT);
        $this->addObserver(new InfoLogger(), self::INFO_OBSERVER_EVENT);
    }

    /**
     * @return Product[]
     * @throws CorruptedFileException
     * @throws ParserFileNotFoundException
     */
    function parse(): array
    {
        $this->logInfo('PARSING STARTED');
        $content = $this->getContentFromFeed();
        $products = [];
        foreach ($content as $item) {
            $products[] = new Product(
                $item->title,
                $item->link,
                $item->pubDate
            );
        }
        $this->logInfo('PARSING DONE');
        return $products;
    }

    public function logError(string $message): void
    {
        $this->fireEvent(self::ERROR_OBSERVER_EVENT, $message);
    }

    public function logInfo(string $message): void
    {
        $this->fireEvent(self::INFO_OBSERVER_EVENT, $message);
    }

    private function getContentFromFeed(): SimpleXMLElement
    {
        if (!file_exists($this->_strFeedUrl)) {
            $this->logError('file to parse not found');
            throw new ParserFileNotFoundException();
        }
        $xml = simplexml_load_file($this->_strFeedUrl, null, LIBXML_NOERROR);
        if ($xml === false) {
            $this->logError('the feed file is empty or corrupted');
            throw new CorruptedFileException();
        }
        return $xml;
    }
}
<?php

namespace Isurance\OOProgramming\Logger;

use Isurance\OOProgramming\Observer\IObserver;
use Isurance\OOProgramming\Observer\IObservable;
use Isurance\OOProgramming\Parser\FeedParserBase;

class ErrorLogger implements IObserver
{
    public function pepe()
    {
        echo "pepe";
    }

    public function notify(IObservable $objSource, $strMessage)
    {
        if ($objSource instanceof FeedParserBase) {
            printf('ERROR -> %s.' . PHP_EOL, $strMessage);
        }
    }
}

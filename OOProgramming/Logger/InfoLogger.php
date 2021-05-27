<?php

namespace Isurance\OOProgramming\Logger;

use Isurance\OOProgramming\Observer\IObservable;
use Isurance\OOProgramming\Observer\IObserver;
use Isurance\OOProgramming\Parser\FeedParserBase;

class InfoLogger implements IObserver
{
    public function notify(IObservable $objSource, $strMessage)
    {
        if ($objSource instanceof FeedParserBase) {
            printf('INFO -> %s.' . PHP_EOL, $strMessage);
        }
    }
}

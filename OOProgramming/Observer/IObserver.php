<?php

namespace Isurance\OOProgramming\Observer;

interface IObserver
{
    public function notify(IObservable $objSource, $strMessage);
}

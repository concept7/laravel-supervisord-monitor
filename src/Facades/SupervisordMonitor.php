<?php

namespace Concept7\SupervisordMonitor\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Concept7\SupervisordMonitor\SupervisordMonitor
 */
class SupervisordMonitor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Concept7\SupervisordMonitor\SupervisordMonitor::class;
    }
}

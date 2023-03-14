<?php

namespace Concept7\SupervisordMonitorCli\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Concept7\SupervisordMonitorCli\SupervisordMonitorCli
 */
class SupervisordMonitorCli extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Concept7\SupervisordMonitorCli\SupervisordMonitorCli::class;
    }
}

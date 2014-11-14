<?php

namespace Banckle\Helpdesk\Facades;

use Illuminate\Support\Facades\Facade;

class Helpdesk extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'banckle';
    }  
}
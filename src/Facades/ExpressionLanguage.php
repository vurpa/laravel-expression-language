<?php

namespace Vurpa\ExpressionLanguage\Facades;

use Illuminate\Support\Facades\Facade;

class ExpressionLanguage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Symfony\Component\ExpressionLanguage\ExpressionLanguage::class;
    }
}

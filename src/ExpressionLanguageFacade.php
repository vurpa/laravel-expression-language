<?php

namespace Vurpa\ExpressionLanguage;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Vurpa\ExpressionLanguage\ExpressionLanguage
 */
class ExpressionLanguageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-expression-language';
    }
}

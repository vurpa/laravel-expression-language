<?php

namespace Vurpa\ExpressionLanguage\Tests;

use Vurpa\ExpressionLanguage\Facades\ExpressionLanguage;

class ExpressionLanguageTest extends TestCase
{
    public function test_can_compile_expression()
    {
        $this->assertSame('(1 + 2)', ExpressionLanguage::compile('1 + 2'));
    }
}

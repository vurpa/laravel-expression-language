<?php

namespace Vurpa\ExpressionLanguage\Tests\Rules;

use Vurpa\ExpressionLanguage\Rules\ExpressionSyntax;
use Vurpa\ExpressionLanguage\Tests\TestCase;

class ExpressionSyntaxTest extends TestCase
{
    public function test_passes_with_valid_syntax()
    {
        $rule = new ExpressionSyntax();

        $this->assertTrue($rule->passes('expression', '1 + 2'));
        $this->assertTrue($rule->passes('expression', 'a + b'));
    }

    public function test_fails_with_invalid_syntax()
    {
        $rule = new ExpressionSyntax();

        $this->assertFalse($rule->passes('expression', '1 +'));
    }
}

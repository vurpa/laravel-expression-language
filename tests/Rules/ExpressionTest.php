<?php

namespace Vurpa\ExpressionLanguage\Tests\Rules;

use Vurpa\ExpressionLanguage\Rules\Expression;
use Vurpa\ExpressionLanguage\Tests\TestCase;

class ExpressionTest extends TestCase
{
    public function test_passes()
    {
        $rule = new Expression(['points' => 10]);

        $this->assertTrue($rule->passes('expression', 'points > 5'));
        $this->assertFalse($rule->passes('expression', 'points < 5'));
    }

    public function test_message()
    {
        $this->assertSame('This value is not valid', (new Expression([]))->message());
        $this->assertSame('Expression failed', (new Expression([], 'Expression failed'))->message());
    }
}

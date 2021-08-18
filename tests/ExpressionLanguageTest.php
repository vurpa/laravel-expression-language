<?php

namespace Vurpa\ExpressionLanguage\Tests;

use Symfony\Component\ExpressionLanguage\SyntaxError;
use Vurpa\ExpressionLanguage\Facades\ExpressionLanguage;

class ExpressionLanguageTest extends TestCase
{
    public function test_can_compile_expression()
    {
        $this->assertSame('(1 + 2)', ExpressionLanguage::compile('1 + 2'));
    }

    public function test_can_evaluate_expression()
    {
        $this->assertSame(3, ExpressionLanguage::evaluate('1 + 2'));
    }

    public function test_can_evaluate_expression_with_variables()
    {
        $user = [
            'points' => 10,
        ];
        $this->assertTrue(ExpressionLanguage::evaluate('user["points"] > 5', [
            'user' => $user,
        ]));
    }

    public function test_can_lint_expression()
    {
        $this->expectException(SyntaxError::class);
        ExpressionLanguage::lint('1 +', []);
    }
}

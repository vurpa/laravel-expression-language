<?php

namespace Vurpa\ExpressionLanguage\Rules;

use Illuminate\Contracts\Validation\Rule;
use Symfony\Component\ExpressionLanguage\SyntaxError;
use Vurpa\ExpressionLanguage\Facades\ExpressionLanguage;

class ExpressionSyntax implements Rule
{
    private $names;

    public function __constructor(?array $names)
    {
        $this->names = $names;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            ExpressionLanguage::lint($value, $this->names);
        } catch (SyntaxError $e) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid syntax';
    }
}

<?php

namespace Vurpa\ExpressionLanguage\Rules;

use Illuminate\Contracts\Validation\Rule;
use Vurpa\ExpressionLanguage\Facades\ExpressionLanguage;

class Expression implements Rule
{
    private $values;
    private $message;

    public function __construct(array $values = [], ?string $message = null)
    {
        $this->values = $values;
        $this->message = $message;
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
        return (bool) ExpressionLanguage::evaluate($value, $this->values);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message ?? 'This value is not valid';
    }
}

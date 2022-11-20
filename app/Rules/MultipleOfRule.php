<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MultipleOfRule implements Rule
{
    public function __construct(protected int $divider)
    {
    }

    public function passes($attribute, $value): bool
    {
        return $value % $this->divider === 0;
    }

    public function message(): string
    {
        return "The :attribute must be multiple of {$this->divider}.";
    }
}

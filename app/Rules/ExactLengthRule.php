<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class ExactLengthRule implements Rule
{
    public function __construct(protected array $expectedValues)
    {
    }

    public function passes($attribute, $value): bool
    {
        return in_array(Str::length($value), $this->expectedValues);
    }

    public function message(): string
    {
        $expectedValues = implode(',', $this->expectedValues);

        return "The :attribute length must be one of those: {$expectedValues}";
    }
}

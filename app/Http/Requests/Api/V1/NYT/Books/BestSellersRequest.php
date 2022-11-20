<?php

namespace App\Http\Requests\Api\V1\NYT\Books;

use App\Rules\ExactLengthRule;
use App\Rules\MultipleOfRule;
use Illuminate\Foundation\Http\FormRequest;

class BestSellersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'author' => ['string'],
            'isbn.*' => ['string', new ExactLengthRule([10, 13])],
            'offset' => ['integer', new MultipleOfRule(20)],
            'title' => ['string'],
        ];
    }
}

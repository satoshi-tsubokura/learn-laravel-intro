<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Tel implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_null($value)) {
            return;
        }
        
        if(! preg_match('/\A\d{1,4}-?\d{1,4}-?\d{1,4}\z/i', $value)) {  
            $fail('正しい電話番号の形式で入力してください。');
        }
    }
}

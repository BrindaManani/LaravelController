<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;

class dateRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $maxDate = Carbon::createFromDate(2025, 12, 31)->endOfDay();

        $inputDate = Carbon::parse($value);

        if ($inputDate->greaterThan($maxDate)) {
            $fail('The ' . $attribute . ' must be a date on or before December 31, 2025.');
        }
    }
}

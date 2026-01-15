<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Route;

class uniqueEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $emailToCheck = (string) $value;
        $emails = collect(session('usersList'))->pluck('email');
        if (Route::hasParameter('id') && Route::input('id')) {
            return;
        }
        if ($emails->contains($emailToCheck)) {
            $fail('The ' . $attribute . ' is already registered.');
        }
    }
}

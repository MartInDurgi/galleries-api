<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhotoFormat implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $formats = ['.jpg', '.png', '.jpeg', '.gif'];

        $contains = false;
        foreach ($formats as $format) {
            if (str_contains($value, $format)) {
                $contains = true;
            }
        }
        if ($contains === false) {
            $fail('url need to contian some photo extension');
        }
        /* if (strtoupper($value) !== $value) {
    $fail('The :attribute must be uppercase.');
} */
    }
}

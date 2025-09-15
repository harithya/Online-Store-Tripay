<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Phone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!ctype_digit($value)) {
            $fail("Nomor $attribute hanya boleh berisi angka.");
            return;
        }

        if (!str_starts_with($value, '62')) {
            $fail("Nomor $attribute harus diawali dengan 62.");
            return;
        }

        $length = strlen($value);
        if ($length < 10 || $length > 15) {
            $fail("Nomor $attribute harus terdiri dari 10 sampai 15 digit.");
        }
    }
}

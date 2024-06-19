<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailOrContactRequired implements Rule
{
    public function passes($attribute, $value)
    {
        return true; // This is not needed as the actual logic will be in the validator.
    }

    public function message()
    {
        return 'Please provide at least an email address or a contact number.';
    }
}

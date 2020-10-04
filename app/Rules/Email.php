<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Email implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
      return preg_match("/^[a-zA-Z0-9][\-\_\.a-zA-Z0-9]*\@[\-\_\.a-zA-Z0-9]*[a-zA-Z0-9]+\.[a-zA-Z]{2,10}$/", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */

    public function message()
    {
        return 'メールアドレスを正しい形式でご入力下さい。';
    }
}

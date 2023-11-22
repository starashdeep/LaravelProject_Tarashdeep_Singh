<?php

namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;

class TenDigitPhoneNumber implements Rule
{
    public function passes($attribute, $value){
        $value=preg_replace('/\D/', '', $value);
        if(strlen($value)!==10){
            return false;
        }
        return count(array_count_values(str_split($value)))!==1;
    }
    public function message(){
        return 'Then Phone Number must be of 10-digits.';
    }
}

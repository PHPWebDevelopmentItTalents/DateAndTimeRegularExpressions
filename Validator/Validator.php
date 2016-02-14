<?php

class Validator
{
    public static function validateIfNotNull($value, $var_name = "Variable"){
        if ( $value === null ) {
            return  $var_name . " should not be null!";
        }

        return false;
    }
    public static function validateIfNotEmptyString($value, $var_name = "String") {
        if ( is_string($value) && $value === '' ) {
            return  $var_name . " should not be empty!";
        }

        return false;
    }
    public static function validateIfNumber($value, $var_name = "Variable") {
        if (! is_numeric ( $value )) {
            return  $var_name . " should have a numeric value!";
        }

        return false;
    }
    public static function validateIfWholeNumber($value, $var_name = "Variable") {
        self::validateIfNumber($value, $var_name);

        if (! (floor ( $value ) == $value)) {
            return $var_name . " should be a whole number!";
        }

        return false;
    }
    public static function validateIfNumberIsInRange($min, $max, $number, $var_name = "Number") {
        self::validateIfNumber($number, $var_name);

        if ($min > (int)$number || (int)$number > $max) {
            return $var_name . " should be between " . $min . " and " . $max;
        }

        return false;
    }
}
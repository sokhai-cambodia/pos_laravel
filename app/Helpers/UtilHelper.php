<?php
namespace App\Helpers;

Class UtilHelper
{

    public static function selected($value, $compareValue) {
        return  $value == $compareValue ? 'selected' : '';
    }

    public static function checked($value, $compareValue) {
        return  $value == $compareValue ? 'checked' : '';
    }

}

?>

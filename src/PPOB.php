<?php
namespace Cst\PPOBLib;

use Illuminate\Support\Str;

class PPOB
{
    public static function pulsa($phone = null, $company_id = null)
    {
        return new Pulsa($phone,  $company_id);
    }

    public static function phone($phones)
    {
        $phones = str_replace('-', '', $phones);
        if (Str::is('+*', $phones)) {
            $phones = str_replace('+', '', $phones);
        } elseif (Str::is('62*', $phones)) {
            $phones = Str::replaceFirst('62', '0', $phones);
        }
        return $phones;
    }
}

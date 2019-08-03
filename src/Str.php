<?php


namespace Boomdraw\Str;

use Illuminate\Support\Str as S;

class Str
{
    /**
     * Returns the portion of string specified by the start and end parameters.
     *
     * @param string $string
     * @param string $start
     * @param string $end
     * @param bool $strict
     * @return bool|string
     */
    public static function between(string $string, string $start, string $end, bool $strict = true)
    {
        if ($strict && (!S::contains($string, $start) || !S::contains($string, $end))) {
            return false;
        }
        $string = S::replaceFirst(S::before($string, $start) . $start, '', $string);
        $string = S::replaceFirst($end . S::after($string, $end), '', $string);

        return $string;
    }
}

<?php

namespace Boomdraw\Str;

use Illuminate\Support\Str as BaseStr;

class Str
{
    /**
     * Returns the portion of the string specified by the start and end parameters.
     *
     * @param string $string
     * @param string $start
     * @param string $end
     * @param bool   $strict
     *
     * @return bool|string
     */
    public static function between(string $string, string $start, string $end, bool $strict = true)
    {
        if ($strict && (!BaseStr::contains($string, $start) || !BaseStr::contains($string, $end))) {
            return false;
        }
        $string = BaseStr::replaceFirst(BaseStr::before($string, $start).$start, '', $string);
        $string = BaseStr::replaceFirst($end.BaseStr::after($string, $end), '', $string);

        return $string;
    }

    /**
     * Returns the portion of the string specified by the start and end parameters with that parameters.
     *
     * @param string $string
     * @param string $start
     * @param string $end
     * @param bool   $strict
     *
     * @return bool|string
     */
    public static function wbetween(string $string, string $start, string $end, bool $strict = true)
    {
        $hasStart = BaseStr::contains($string, $start);
        $hasEnd = BaseStr::contains($string, $end);
        if ($strict && (!$hasStart || !$hasEnd)) {
            return false;
        }
        $string = self::between($string, $start, $end, false);
        if ($hasStart) {
            $string = $start.$string;
        }
        if ($hasEnd) {
            $string .= $end;
        }

        return $string;
    }

    /**
     * Trim that additionally removes slashes.
     *
     * @param string $string
     *
     * @return string
     */
    public static function utrim(string $string): string
    {
        return trim($string, " \t\n\r\0\x0B/\\");
    }
}

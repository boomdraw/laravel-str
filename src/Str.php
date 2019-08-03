<?php


namespace Boomdraw\Str;

use Illuminate\Support\Str as S;

class Str
{
    /**
     * Returns the portion of the string specified by the start and end parameters.
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

    /**
     * Returns the portion of the string specified by the start and end parameters with that parameters.
     *
     * @param string $string
     * @param string $start
     * @param string $end
     * @param bool $strict
     * @return bool|string
     */
    public static function wbetween(string $string, string $start, string $end, bool $strict = true)
    {
        $hasStart = S::contains($string, $start);
        $hasEnd = S::contains($string, $end);
        if ($strict && (!$hasStart || !$hasEnd)) {
            return false;
        }
        $string = self::between($string, $start, $end, false);
        if ($hasStart) {
            $string = $start . $string;
        }
        if ($hasEnd) {
            $string .= $end;
        }

        return $string;
    }
    }
}

<?php


namespace Boomdraw\Str\Tests\Unit;

use Illuminate\Support\Str;
use Boomdraw\Str\Tests\TestCase;

class StrTest extends TestCase
{
    public function testBetween()
    {
        [$u1, $u2, $u3, $u4, $u5] = [uniqid(), uniqid(), uniqid(), uniqid(), uniqid()];
        $string = "$u1 $u2 $u3";
        $this->assertSame(Str::between($string, "$u1 ", " $u3"), $u2);
        $this->assertFalse(Str::between($string, $u4, $u5));
        $this->assertSame(Str::between($string, $u4, $u5, false), $string);
        $this->assertSame(Str::between($string, "$u1 ", $u5, false), "$u2 $u3");
        $this->assertSame(Str::between($string, $u4, " $u3", false), "$u1 $u2");
    }

    public function testWbetween()
    {
        [$u1, $u2, $u3, $u4, $u5, $u6, $u7] = [uniqid(), uniqid(), uniqid(), uniqid(), uniqid(), uniqid(), uniqid()];
        $string = "$u1 $u2 $u3 $u4 $u5";
        $this->assertSame(Str::wbetween($string, "$u2 ", " $u4"), "$u2 $u3 $u4");
        $this->assertFalse(Str::wbetween($string, $u6, $u7));
        $this->assertSame(Str::wbetween($string, $u6, $u7, false), $string);
        $this->assertSame(Str::wbetween($string, "$u2 ", $u7, false), "$u2 $u3 $u4 $u5");
        $this->assertSame(Str::wbetween($string, $u6, " $u4", false), "$u1 $u2 $u3 $u4");
    }

    public function testUtrim()
    {
        $string = uniqid();
        $this->assertSame(Str::utrim("\\/$string "), $string);
    }
}

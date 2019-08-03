<?php


namespace Boomdraw\Str\Tests\Unit;

use Illuminate\Support\Str;
use Boomdraw\Str\Tests\TestCase;

class StrTest extends TestCase
{
    public function testBetween()
    {
        $string = 'foo bar baz';
        $this->assertSame(Str::between($string, 'foo ', ' baz'), 'bar');
        $this->assertFalse(Str::between($string, 'q', 't'));
        $this->assertSame(Str::between($string, 'q', 't', false), $string);
        $this->assertSame(Str::between($string, 'foo ', 't', false), 'bar baz');
        $this->assertSame(Str::between($string, 'q ', ' baz', false), 'foo bar');
    }
}

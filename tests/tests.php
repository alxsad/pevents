<?php

use Pevents\Pevents;

class EventEmitterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Pevents
     */
    private $pevents;

    public function setUp()
    {
        $this->pevents = new Pevents();
    }

    public function testNotifyWithoutArgs()
    {
        $test = 1;
        $this->pevents->on('test', function () use (&$test)  {
            $test = 2;
        });
        $this->assertEquals(1, $test);
        $this->pevents->notify('test');
        $this->assertEquals(2, $test);
    }

    public function testNotifyWithArgs()
    {
        $test = 1;
        $this->pevents->on('test', function ($new) use (&$test)  {
            $test = $new;
        });
        $this->assertEquals(1, $test);
        $this->pevents->notify('test', [2]);
        $this->assertEquals(2, $test);
    }
}
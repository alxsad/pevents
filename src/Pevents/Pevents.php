<?php

namespace Pevents;

class Pevents implements PeventsInterface
{
    /**
     * @var array
     */
    protected $fns = [];

    /**
     * @param string $event
     * @param \Closure $fn
     */
    public function on($event, \Closure $fn)
    {
        if (!array_key_exists($event, $this->fns)) {
            $this->fns[$event] = [];
        }
        $this->fns[$event][] = $fn;
    }

    /**
     * @param string $event
     * @param array $args
     */
    public function notify($event, array $args = [])
    {
        if (array_key_exists($event, $this->fns)) {
            foreach ($this->fns[$event] as $event) {
                call_user_func_array($event, $args);
            }
        }
    }
}
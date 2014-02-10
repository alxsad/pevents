<?php

namespace Pevents;

interface PeventsInterface
{
    /**
     * @param string $event
     * @param \Closure $fn
     */
    public function on($event, \Closure $fn);

    /**
     * @param string $event
     * @param array $args
     */
    public function notify($event, array $args = []);
}
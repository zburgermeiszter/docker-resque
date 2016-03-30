<?php

namespace Jobs;

class FibonacciJob
{
    public function perform()
    {
        //echo $this->fib($this->args['n']);
        fwrite(STDOUT, $this->fib($this->args['n']) . PHP_EOL);
    }

    private function fib($n)
    {
        if ($n == 0 || $n == 1) {
            return $n;
        }

        return $this->fib($n - 1) + $this->fib($n - 2);
    }
}
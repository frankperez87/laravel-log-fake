<?php

namespace frankperez87\LaravelLogFake;

use PHPUnit\Framework\Assert as PHPUnit;
use Psr\Log\AbstractLogger;

class LogFake extends AbstractLogger
{
    protected $context = [];

    protected $logs = [];

    public function log($level, string|\Stringable $message, array $context = []): void
    {
        array_push($this->logs, [
            'level' => $level,
            'message' => $message,
        ]);

        $this->withContext($context);
    }

    public function assertLogged($callback)
    {
        $logs = array_filter($this->logs, $callback);

        PHPUnit::assertTrue(
            count($logs) > 0,
            'The message was logged.'
        );
    }

    public function assertContext($callback)
    {
        PHPUnit::assertTrue(
            $callback($this->context),
            'The context was found.'
        );
    }

    public function withContext(array $context = [])
    {
        $this->context = array_merge($this->context, $context);

        return $this;
    }
}

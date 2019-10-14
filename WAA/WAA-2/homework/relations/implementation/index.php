<?php

declare(strict_types=1);

namespace Implementation;

/*
 * Реализация.
 * В примере (условно) LoggerInterface - интерфейс для службы логирования,
 * Logger - класс реализующий интерфейс, сама служба логирования.
 * Logger имплементирует (реализует) интерфейс LoggerInterface. Для этого
 * необходимо полностью реализовать все методы интерфейса.
 */

interface LoggerInterface
{
    public function info(string $message): void;
    public function error(string $message): void;
}

class Logger implements LoggerInterface
{
    /**
     * @param string $message
     */
    public function info(string $message): void
    {
        // Log info $message
    }

    /**
     * @param string $message
     */
    public function error(string $message): void
    {
        // Log error $message
    }
}
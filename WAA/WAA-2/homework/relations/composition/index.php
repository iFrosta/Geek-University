<?php

declare(strict_types=1);

namespace Composition;

/*
 * Композиция.
 * В примере (условно) Balance - это баланс пользователя, User - пользователь.
 * User не может существовать без баланса, время жизни баланса у пользователя
 * равно времени жизни самого пользователя. То есть, когда пользователь будет
 * удален, баланс этого пользователя тоже должен удалиться.
 */

class Balance
{
}

class User
{
    /**
     * @var Balance
     */
    private $balance;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->balance = new Balance();
    }
}
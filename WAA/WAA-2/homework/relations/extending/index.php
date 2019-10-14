<?php

declare(strict_types=1);

namespace Extending;

/*
 * Наследование/обобщение.
 * В примере (условно) Person - человек, Employee - рабочий.
 * Employee наследуется от Person. У нашего Employee должно быть имя, нам это
 * имя будет предоставлять класс Person.
 */

class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * Person constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class Employee extends Person
{
    /**
     * @var string
     */
    private $position;

    /**
     * Employee constructor.
     * @param string $name
     * @param string $position
     */
    public function __construct(string $name, string $position)
    {
        parent::__construct($name);
        $this->position = $position;
    }
}
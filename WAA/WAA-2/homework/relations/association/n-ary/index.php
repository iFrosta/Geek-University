<?php

declare(strict_types=1);

namespace NaryAssociation;

/*
 * N-арная ассоциация.
 * В примере (условно) Role - это роль пользователя, User - пользователь.
 * Пользователь может иметь Role'и, а может и не иметь их. Для создания
 * User нет необходимости в создании Role. Мы можем добавить Role через
 * метод addRole, если это будет нужно.
 * N-арная - означает что связь один ко многим. У одного User может быть
 * много Role.
 */

class Role
{
}

class User
{
    /**
     * @var []Role
     */
    private $roles = [];

    /**
     * @param Role $role
     */
    public function addRole(Role $role): void
    {
        array_push($this->roles, $role);
    }
}

$user = new User();

$role1 = new Role();
$user->addRole($role1);

$role2 = new Role();
$user->addRole($role2);

<?php

declare(strict_types=1);

namespace Dependency;

/*
 * Зависимость.
 * В примере (условно) UsersList - это лист пользователей, User - пользователь.
 * UsersList зависит от User, если в User что-то поменяется, то необходимо
 * будет посмотреть, нужно ли что-то менять в логике UsersList.
 */

class UsersList
{
    /**
     * @param User[] $users
     */
    public static function show(array $users)
    {
        // Работа с массивом $users, в котором лежат экземпляры класса User.
    }
}

class User
{
}

UsersList::show([new User(), new User()]);
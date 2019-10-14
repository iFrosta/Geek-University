<?php

declare(strict_types=1);

namespace BinaryAssociation;

/*
 * Бинарная ассоциация.
 * В примере (условно) Email - это email пользователя, User - пользователь.
 * Пользователь может иметь Email, а может и не иметь его. Для создания
 * пользователя нет необходимости в Email, но мы можем Email добавить через
 * метод setEmail.
 * Бинарная - означает что связь один к одному. У одного пользователя может
 * быть только один Email.
 */

class Email
{
}

class User
{
    /**
     * @var ?Email
     */
    private $email;

    /**
     * @param Email $email
     */
    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }
}

$email = new Email();
$user = new User();
$user->setEmail($email);
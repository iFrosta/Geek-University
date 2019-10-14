<?php

declare(strict_types=1);

namespace Aggregation;

/*
 * Агрегация.
 * В примере (условно) Db - сервис для доступа в базу данных, Repository -
 * сервис для аккумулирования логики доступа к базе данных.
 * Repository не может работать без Db, поэтому при создании нам Db надо
 * передать. Db может работать и отдельно, время жизни Db и Repository
 * никак друг с другом не связаны.
 */

class Db
{

}

class Repository
{
    /**
     * @var Db
     */
    private $db;

    /**
     * User constructor.
     * @param Db $db
     */
    public function __construct(Db $db)
    {
        $this->db = $db;
    }
}
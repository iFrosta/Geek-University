<?php

function getBasketSumm() {
    $session = session_id();

    $sql = "SELECT sum(images.price) as summ FROM `basket`,`images` WHERE `basket`.`good`=`images`.`idx` AND `session` = '{$session}'";

    $summ = getAssocResult($sql);

    $result = [];
    if (isset($summ[0]))
        $result = $summ[0];

    return $result['summ'];
}

function deleteFromBasket($id) {
    $session = session_id();
    $id = (int)$id;

    $sql = "DELETE FROM `basket` WHERE id = {$id} AND session = '{$session}'";

    return executeQuery($sql);
}

function getBasket() {
    $session = session_id();

    $sql = "SELECT * FROM `basket`,`images` WHERE `basket`.`good`=`images`.`idx` AND `session` = '{$session}'";
    return getAssocResult($sql);
}

function addToBasket($id) {
    $session = session_id();
    $id = (int)$id;
    $sql = "INSERT INTO `basket` (`session`, `good`) VALUES ('{$session}', '{$id}');";
    return executeQuery($sql);
}

function getBasketCount() {
    $session = session_id();
    $sql = "SELECT count(*) as count FROM `basket` WHERE `session`='{$session}'";
    $count = getAssocResult($sql);

    $result = [];
    if (isset($count[0]))
        $result = $count[0];

    return $result['count'];
}
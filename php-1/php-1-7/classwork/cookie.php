<?php

setcookie("login", "admin", time()+3600);

echo $_COOKIE['login'];
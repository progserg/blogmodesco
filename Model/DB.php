<?php

namespace Model;

use PDO;

class DB
{
    public function __construct()
    {

    }

    public function init()
    {
        $db_config = file_get_contents(__DIR__ . '/../conf.json');
        $db_config = json_decode($db_config);
        $dsn = 'mysql:host=' . $db_config->host . ';dbname=' . $db_config->dbname;
        $username = $db_config->username;
        $password = $db_config->password;
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );

        //создаем PDO объект для работы с БД
        return new PDO($dsn, $username, $password, $options);
    }
}
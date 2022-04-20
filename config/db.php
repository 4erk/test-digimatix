<?php

use yii\db\Connection;

return [
    'class'    => Connection::class,
    'dsn'      => 'mysql:host=mysql:3307;dbname=api',
    'username' => 'user',
    'password' => 'qweqwe',
    'charset'  => 'utf8mb4',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

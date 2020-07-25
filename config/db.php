<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=127.0.0.1;dbname=examengesprekken',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    'enableSchemaCache' => true,
    'schemaCacheDuration'=>3600,
    'enableQueryCache' => true,
    'queryCacheDuration'=>3600,
    'schemaCache' => 'cache',
];

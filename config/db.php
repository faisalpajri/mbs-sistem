<?php

return [
    'class' => 'yii\db\Connection',
    //'dsn' => 'mysql:host=localhost;dbname=mbs_db',
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=sriwijaya_logistic_db',
    //'username' => 'root',
    'username' => 'postgres',
    //'password' => '',
    'password' => 'P@ssw0rd',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

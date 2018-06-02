<?php 

return [
    // Options (core, iluminate)
    'baseModel' => 'illuminate',
    /*Options (mysql, sqlite) */
    'driver' => 'mysql',
    'sqlite' =>[
        'host' => 'database.db'
    ],
    'mysql' => [
        'host' => 'localhost',
        'database' => 'cursomvc',
        'user' => 'root',
        'password' => '',
        'charset' => 'UTF8',
        'collation' => 'utf8_unicode_ci'
    ]

];

?>
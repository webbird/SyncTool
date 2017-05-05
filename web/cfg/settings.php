<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'template_path' => __DIR__ . '/../templates/default/',
        'theme'         => 'darkly',

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // I18n
        'translations_path' => __DIR__ . '/../translations/',
        'lang' => 'en',

        // Synchronizer paths
        'synchronizer' => [
            'root_path' => SIA_BASE_PATH,
            'config_path' => SIA_BASE_PATH.'/etc',
            'log_path'  => SIA_BASE_PATH.'/logs',
            'default_path' => 'default',
            'source_conf' => 'source.json',
            'target_conf' => 'target.json',
        ],

        // basics
        'uri' => 'http://localhost:8080',
    ]
];

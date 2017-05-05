<?php

define('SIA_BASE_PATH',__DIR__ . '/../console');
define('SIA_VENDOR_PATH',__DIR__ . '/../console/vendor');
define('SIA_CFG_PATH',__DIR__.'/cfg');

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require SIA_VENDOR_PATH.'/autoload.php';

spl_autoload_register(function ($classname) {
    if(!substr_compare($classname,'SyncTool',0,strlen('SyncTool')))
    {
        $classname = str_replace('SyncTool\\','',$classname);
        if(file_exists(__DIR__ . '/controller/' . $classname . '.php'))
            require  __DIR__ . '/controller/' . $classname . '.php';
        elseif(file_exists(SIA_BASE_PATH.'/src/'.$classname.'.php'))
            require SIA_BASE_PATH.'/src/'.$classname.'.php';
    }
    if(!substr_compare($classname,'wblib',0,5))
    {
        $classname = str_replace('wblib\\','',$classname);
        require SIA_VENDOR_PATH.'/wblib/'.$classname.'.php';
    }
});

session_start();

// Instantiate the app
$settings = require SIA_CFG_PATH.'/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require SIA_CFG_PATH.'/dependencies.php';

// Set up wbForms
require SIA_CFG_PATH.'/forms.php';

// Register routes
$app->any(
    '/[{controller}[/{param}[/{param2}]]]',
    \SyncTool\main::class
);

// Run app
$app->run();

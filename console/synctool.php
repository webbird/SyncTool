<?php

require __dir__.'/vendor/autoload.php';

spl_autoload_register(function ($classname) {
    if(!substr_compare($classname,'SyncTool',0,9))
    {
        $classname = str_replace('SyncTool\\','',$classname);
        require  __DIR__.'/src/'.$classname.'.php';
    }
    if(!substr_compare($classname,'wblib',0,5))
    {
        $classname = str_replace('wblib\\','',$classname);
        require __dir__.'/vendor/wblib/'.$classname.'.php';
    }
});

// get source config
$src_cfg = json_decode(file_get_contents(__dir__.'/etc/default/source.json'),true);
$source  = new \SyncTool\LDAP\AD($src_cfg);
$source->connect();
$source->load();
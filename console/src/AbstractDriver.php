<?php

namespace SyncTool;

abstract class AbstractDriver
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function connect()
    {
        echo "please implement the connection creation method\n";
        exit;
    }

    public function load()
    {
    }
}
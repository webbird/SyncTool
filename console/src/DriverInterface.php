<?php

namespace SyncTool;

interface DriverInterface
{
    public function connect();
    public function load();
}
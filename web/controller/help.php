<?php

namespace SyncTool;

class help {
    protected $c;

    // constructor receives container instance
    public function __construct(\Interop\Container\ContainerInterface $c) {
        $this->c = $c;
    }

    /**
     *
     * @access public
     * @return
     **/
    public function exec($request, $response, $args)
    {
        $c =& $this->c;
        include $this->c->get('settings')['template_path'].'/help.tpl';
    }   // end function exec()
    
}
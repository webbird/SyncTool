<?php

namespace SyncTool;

class main {

   protected $c;

   // constructor receives c instance
   public function __construct(\Interop\Container\ContainerInterface $c) {
       $this->c = $c;
   }

    /**
     *
     * @access public
     * @return
     **/
    public function __invoke($request, $response, $args)
    {
        $controller = isset($args['controller'])
                    ? '\\SyncTool\\'.$args['controller']
                    : null;
        $this->c['route_name'] = $args['controller'];

        $action     = isset($args['param2'])
                    ? $args['param']
                    : 'exec';

        // list of available datasources (for navigation)
        $this->c['datasources'] = \SyncTool\datasource::list($this->c);

        // alias
        $c =& $this->c;

        if($controller) {
            $c = new $controller($this->c);
            return $c->$action($request, $response, $args);
        }
        include $this->c->get('settings')['template_path'].'/index.tpl';
    }   // end function run()
    
}
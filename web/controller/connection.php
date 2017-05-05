<?php

namespace SyncTool;

class connection
{

   protected $c;
   protected $f;

   // constructor receives container instance
   public function __construct(\Interop\Container\ContainerInterface $c) {
       $this->c = $c;
       $this->f = \wblib\wbForms::getInstanceFromFile('forms.inc.php',__dir__.'/connection');
       \wblib\wbFormsJQuery::set('enabled',false);
   }

    /**
     *
     * @access public
     * @return
     **/
    public function exec($request, $response, $args)
    {
        $this->c['conn_type'] = null;
        if($args['param']!=='new') {
            // get config
            $path = $this->c->get('settings')['synchronizer']['config_path'] . '/'
                  . $args['param'] . '/'
                  . $this->c->get('settings')['synchronizer']['source_conf']
                  ;
            $cfg  = json_decode(file_get_contents($path), true);

            $this->f->setForm('ldap');
            $this->f->setData($cfg['defaults']);
            $this->f->getElement('type')->setAttr('disabled','disabled');

            $this->c['conn_type'] = 'ldap';
        }
        $this->c['conn_name'] = $args['param'];
        include $this->c->get('settings')['template_path'].'/connection.tpl';
    }   // end function exec()
    
}
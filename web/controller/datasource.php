<?php

namespace SyncTool;

class datasource
{

   protected $c;
   protected $f;
   protected static $loglevels = array('off'=>0,'moderate'=>1,'full'=>2);

   // constructor receives container instance
   public function __construct(\Interop\Container\ContainerInterface $c) {
       $this->c = $c;
       $this->f = \wblib\wbForms::getInstanceFromFile('forms.inc.php',__dir__.'/datasource');
       \wblib\wbFormsJQuery::set('enabled',false);
   }

    /**
     *
     * @access public
     * @return
     **/
    public function edit($request, $response, $args)
    {
        $this->c['source_type'] = null;
        $cfg = $this->loadConfig($args['param2']);
        $this->c['source_name'] = $args['param2'];

        // alias
        $c =& $this->c;

        // set form action
        $this->f->setAttr('action','/datasource/save/'.$args['param2']);

        include $this->c->get('settings')['template_path'].'/datasource.tpl';
    }   // end function edit()

    /**
     *
     * @access public
     * @return
     **/
    public static function list($c)
    {
        $path = $c->get('settings')['synchronizer']['config_path'].'/datasources/*';
        $dirs = \SyncTool\Helper::findDirectories(
            $path,
            array(
                'max_depth'=>1,
                'remove_prefix'=>true
            )
        );
        return $dirs;
    }   // end function list()
    
    /**
     *
     * @access public
     * @return
     **/
    public function save($request, $response, $args)
    {
        // read config file and initialize form
        $cfg = $this->loadConfig($args['param2']);
        // check if form is valid
        if($this->f->isSent() && $this->f->isValid())
        {
            $changes = 0;
            $data    = $this->f->getData(); // form data
            foreach(array_values(array('defaults','connection')) as $reg)
            {
                foreach($cfg[$reg] as $key => $val)
                {
                    if(isset($data[$key]) && $data[$key] != $val)
                    {
                        $changes++;
                        if($key=='loglevel')
                        {
                            $data[$key] = self::$loglevels[$data[$key]];
                        }
                        $cfg[$reg][$key] = $data[$key];
                    }
                }
            }
            if($changes>0)
            {
                $path = $this->c->get('settings')['synchronizer']['config_path'].'/'
                      . 'datasources/'
                      . $args['param2'].'/'
                      . 'config.json'
                      ;
                $newdata = json_encode($cfg,JSON_PRETTY_PRINT);
                if(strlen($newdata))
                   file_put_contents($path, $newdata);
            }
        }
        $this->c['message'] = $this->c['trans']->t('Your changes where saved.');
        $this->c['redirect_url'] = $this->c->get('settings')['uri'].'/datasource/edit/'.$args['param2'];
        $c =& $this->c;
        include $this->c->get('settings')['template_path'].'/success.tpl';
    }

    /**
     *
     * @access private
     * @return
     **/
    private function loadConfig($subdir)
    {
        // get config
        $path = $this->c->get('settings')['synchronizer']['config_path'].'/'
              . 'datasources/'
              . $subdir.'/'
              . 'config.json'
              ;
        if(file_exists($path))
        {
            $cfg  = json_decode(file_get_contents($path),true);
            $type = explode('\\',strtolower($cfg['driver']));
            $form = array_shift($type);
            $this->f->setForm($form);
            $this->f->getElement('type')->setValue($cfg['driver']);
            $this->f->getElement('type')->setAttr('disabled','disabled');
            $this->c['type'] = $type;
            if(count($type)>0)
            {
                $this->f->addForm($form,$type[0]);
            }
            $this->f->setData(array_merge($cfg['defaults'],$cfg['connection']));
            // loglevel
            $ll = array_flip(self::$loglevels)[$cfg['defaults']['loglevel']];
            if($ll)
                $this->f->getElement('loglevel')->setValue($ll);
            // password repeat
            if($this->f->hasElement('password2'))
                $this->f->getElement('password2')->setValue($cfg['connection']['password']);
        } else {
            throw new \Exception($this->c->get('trans')->t('No such datasource'));
        }
        return $cfg;
    }   // end function loadConfig()
    
}
<?php

namespace SyncTool\LDAP;

use \LdapTools\Configuration as Configuration;
use \LdapTools\DomainConfiguration as DomainConfiguration;
use \LdapTools\Object\LdapObjectType as LdapObjectType;
use \LdapTools\LdapManager as LdapManager;

if(!class_exists('\SyncTool\LDAP\AD',false))
{
    class AD extends \SyncTool\LDAP implements \SyncTool\DriverInterface
    {
        private        $conn = null;
        private static $map  = array(
            'users'     => LdapObjectType::USER,
            'computers' => LdapObjectType::COMPUTER
        );

        /**
         *
         * @access public
         * @return
         **/
        public function connect()
        {
            $cfg = $this->config['connection']; // just to spare some typing...
            // check required fields
            foreach(array_values(array('domain','host','user','password','basedn')) as $key)
            {
                if(!isset($cfg[$key])) {
                    throw new \Exception("ERROR: Missing mandatory option '$key'");
                    return false;
                }
            }

            // create the object
            try {
                $config = new Configuration();
                $domain = (new DomainConfiguration($cfg['domain']))
                    ->setBaseDn($cfg['basedn'])
                    ->setServers([$cfg['host']])
                    ->setUsername($cfg['user'])
                    ->setPassword($cfg['password']);
                $config->addDomain($domain);
                $this->conn = new LdapManager($config);
            } catch ( \Exception $e ) {
                echo $e->getMessage();
            }

        }   // end function connect()

        /**
         *
         * @access public
         * @return
         **/
        public function load()
        {
            $what = $this->config['find'];
            $lqb  = $this->conn->buildLdapQuery();

            $lqb->from(self::$map[$what]);

            if(isset($this->config['filter'])) {
                if(is_array($this->config['filter']) && count($this->config['filter'])) {
                    foreach($this->config['filter'] as $index => $item)
                    {
                        foreach($item as $shortcut => $query)
                        {
                            if(is_array($query) && count($query) > 1)
                            {
                                $filter = $lqb->filter()->$shortcut($query[0],$query[1]);
                            } else {
                                $filter = $lqb->filter()->$shortcut($query);
                            }
                            $lqb->where($filter);
                        }
                    }
                }
            }
            $data = $lqb->getLdapQuery()
                        ->getResult();
print_r($data);
        }   // end function load()
/*
use LdapTools\Utilities\ArrayToOperator;

$filter = [
    ['present' => 'sn'],
    ['present' => 'givenName'],
    ['like' => ['cn', 'b*']],
];
$ob = new ArrayToOperator();
$where = $ob->toOperator($filter);

# Check the raw filter it produced...
var_dump($where->toLdapFilter());

$users = $ldap->buildLdapQuery()
    ->from('user')
    ->add($where)
    ->getLdapQuery()
    ->getResult();
*/

    }
}

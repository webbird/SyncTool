<?php

namespace SyncTool;

use \LdapTools\Configuration;
use \LdapTools\LdapManager as LdapManager;

if(!class_exists('\SyncTool\LDAP',false))
{

    class LDAP extends AbstractDriver implements DriverInterface
    {
        private $conn = null;

        /**
         *
         * @access public
         * @return
         **/
        public function connect()
        {
            
        }   // end function connect()
        
    }
}

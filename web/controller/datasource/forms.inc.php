<?php

$FORMS = array(
    'ldap' => array(
        array(
            'type'=>'legend','label'=>'Common settings'
        ),
        array(
            'type'=>'text','name'=>'type','label'=>'Datasource type','value'=>''
        ),
        array(
            'type'=>'select','name'=>'loglevel','label'=>'Loglevel','options'=>array('off','moderate','full'),
        ),
        array(
            'type'=>'text','name'=>'idfield','label'=>'Identification attribute','value'=>'distinguishedname'
        ),
        array(
            'type'=>'text','name'=>'sidfield','label'=>'Security Identifier (SID) attribute','value'=>'objectsid'
        ),
        array(
            'type'=>'text','name'=>'namefield','label'=>'Naming attribute','value'=>'cn'
        ),
        array(
            'type'=>'text','name'=>'modfield','label'=>'Last modification date attribute','value'=>'whenchanged'
        ),

        array(
            'type'=>'legend','label'=>'Connection settings',
        ),
        array(
            'type'=>'text','name'=>'user','label'=>'Username','required'=>true,
        ),
        array(
            'type'=>'password','name'=>'password','label'=>'Password','required'=>true,
        ),
        array(
            'type'=>'password','name'=>'password2','label'=>'Repeat Password','required'=>true,'data-match'=>"#password"
        ),
        array(
            'type'=>'text','name'=>'host','label'=>'Hostname','required'=>true,
        ),
        array(
            'type'=>'text','name'=>'port','label'=>'Port','placeholder'=>'Leave blank to use the default (309)','pattern'=>'[0-9]{1,}',
        ),
        array(
            'type'=>'divider',
        ),
        array(
            'type'=>'checkbox','name'=>'require_tls','label'=>'Require TLS',
        ),
        array(
            'type'=>'select','name'=>'sslversion','label'=>'SSL Version','options'=>array(1,2,3),'value'=>3,
        ),
        array(
            'type'=>'text','name'=>'timelimit','label'=>'Time limit','value'=>600,
        ),
    ),
    'ad' => array(
        array(
            'type'=>'divider',
        ),
        array(
            'type'=>'text','name'=>'domain','label'=>'Domain','required'=>true,
        ),
        array(
            'type'=>'text','name'=>'basedn','label'=>'Base DN','required'=>true,
        ),
    ),
);
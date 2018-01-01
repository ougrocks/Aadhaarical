<?php

$config['db'] = array(
    
    'host'                  => 'localhost',
    'username'              => 'root',
    'password'              => '',
    'dbname'                => 'aadhaaric_licence'
    
);

        
$db = new PDO('mysql:host='.$config['db']['host'].';dbname='.$config['db']['dbname'], $config['db']['username'],$config['db']['password']);

?>
   
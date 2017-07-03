<?php
// redis master server address
return array(
    'cluster' => false, //enable [true] when redis version is gt 3.0.
    'timeout' => 10,
    'database' => 0,	//enable when cluster is false.
   'master' => array('127.0.0.1:6379'),
// 	'master' => array('10.144.163.72:6379'),
);
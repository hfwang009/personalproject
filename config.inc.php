<?php
define('UC_CONNECT', 'mysql');
define('UC_DBHOST', '127.0.0.1');
define('UC_DBUSER', 'yitudata');
define('UC_DBPW', 'yitukeji2014');
define('UC_DBNAME', 'yituucenter');
define('UC_DBCHARSET', 'utf8');
define('UC_DBTABLEPRE', '`yituucenter`.uc_');
define('UC_DBCONNECT', '0');
define('UC_KEY', '63A624a8825dX3KfS2jcd0V513x0D59eA3t3O5e9K2vcZ2E0D45o7dU0W4l6eeRd');
define('UC_API', 'http://ucenter.yituyun.com');
define('UC_CHARSET', 'utf-8');
define('UC_IP', '');
define('UC_APPID', '3');
define('UC_PPP', '20');



//ucexample_2.php 用到的应用程序数据库连接参数
$dbhost = '127.0.0.1';			// 数据库服务器
$dbuser = 'yitudata';			// 数据库用户名
$dbpw = 'yitukeji2014';				// 数据库密码
$dbname = 'yituucenter';			// 数据库名
$pconnect = 0;				// 数据库持久连接 0=关闭, 1=打开
$tablepre = 'uc_';   		// 表名前缀, 同一数据库安装多个论坛请修改此处
$dbcharset = 'utf8';			// MySQL 字符集, 可选 'gbk', 'big5', 'utf8', 'latin1', 留空为按照论坛字符集设定

//同步登录 Cookie 设置
$cookiedomain = ''; 			// cookie 作用域
$cookiepath = '/';			// cookie 作用路径
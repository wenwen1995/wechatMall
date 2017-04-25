<?php
//配置数据库连接信息
return array(
	//'配置项'=>'配置值'
	'DB_TYPE' => 'mysql',  //数据库类型
	'DB_HOST' => '127.0.0.1', //服务器名称
	'DB_NAME' => 'wemall', //数据库名称
	'DB_USER' => 'root',  //用户名
	'DB_PWD'  => '',  //密码
	'DB_PORT' => '3306', //连接端口
	'DB_DSN' => '', //数据库连接dsn用于 pdo方式
	'DB_CHARSET' => 'utf8', //数据库字符集
    'TMPL_PARSE_STRING' =>array(
    	'__css__' => __ROOT__.'/Public/assets/css',
    	'__js__' => __ROOT__.'/Public/assets/js',
    	'__img__' => __ROOT__.'/Public/assets/image',
		),
);
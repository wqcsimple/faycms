<?php
/**
 * 该文件的配置项将覆盖外层/config/main.php的配置
 * 若不设置则默认使用外面的配置参数
 */
return array(
    /*
     * 数据库参数
     */
    'db' => array(
        'host' => 'db',                    //数据库服务器
        'user' => 'root',//用户名
        'password' => '7',//密码
        'port' => 3306,                            //端口
        'dbname' => 'fay_cms',                    //数据库名
        'charset' => 'utf8mb4',                        //数据库编码方式
        'table_prefix' => 'fay_',                //数据库表前缀
    ),

    /*
     * 当前application包含的模块
     */
    'modules' => array(
        'frontend'
    ),


    'debug' => true,
);
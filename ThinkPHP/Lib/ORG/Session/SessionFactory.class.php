<?php

/**
 * 创建session配置程序，选择session驱动
 * 支持db和redis两种模式，db需要创建对应的数据库合表，结构如下：
 * +----------------------------------------------------------------------------+
 * |    CREATE DATABASE session;                                                |
 * +----------------------------------------------------------------------------+
 * +----------------------------------------------------------------------------+
 * |    CREATE TABLE `session` (                                                |
 * |      `session_id` varchar(40) NOT NULL COMMENT '会话id，最大40长度',        |
 * |      `session_expire` int(11) NOT NULL COMMENT '过期时间',                    |
 * |      `session_data` text NOT NULL COMMENT '最大65535个bytes',                |
 * |      PRIMARY KEY (`session_id`),                                            |
 * |      index key(`session_expire`)                                            |
 * |    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;                                    |
 * +----------------------------------------------------------------------------+
 * 使用方式
 *                                        DB
 * +----------------------------------------------------------------------------+
 * |     session::getSession('db', array(                                        |
 * |        'host' => "localhost",                                                |
 * |        'user' => "root",                                                    |
 * |        'passwd' => "yourpasswd",                                            |
 * |        'db' => "session",                                                    |
 * |        'table' => "session",                                                |
 * |    ))->begin();                                                            |
 * +----------------------------------------------------------------------------+
 *                                        REDIS
 * +----------------------------------------------------------------------------+
 * |     session::getSession('db', array(                                        |
 * |        'host' => "localhost",                                                |
 * |        'port' => 6379,                                                    |
 * |    ))->begin();                                                            |
 * +----------------------------------------------------------------------------+
 *
 */
class SessionFactory
{
    /**
     * 驱动程序句柄保存
     */
    private static $_handler = null;

    /**
     * 创建session驱动程序
     */
    public static function getSession($type, $options)
    {
        //单例
        if (isset(self::$_handler)) {
            return self::$_handler;
        }

        switch ($type) {
            case 'db': //数据库驱动session类型
                import('Think.ORG.Session.dbSession');
                $handler = new dbSession($options);
                break;

            case 'redis': //redis驱动session类型
                import('Think.ORG.Session.RedisSession');
                $handler = new RedisSession($options);
                break;
            default:
                return false;
                break;
        }

        return self::$_handler = $handler;
    }
}

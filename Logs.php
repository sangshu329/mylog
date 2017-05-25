<?php

/**
 * Created by PhpStorm.
 * User: sien
 * Date: 2017/5/25 0025
 * Time: 23:09
 */
/* 非常建议的日志类，用于快速使用日志功能 ，建议使用功能完善的monolog */

class Logs
{
    protected static $path = './logs/';
    protected static $filename = 'mylog';

    public static function logger($key, $str, $type = 'debug', $dir = './')
    {
        self::mklogdir();
        $filename = self::$filename;
        $path = self::$path;
        if(!is_string($key)){
            die('内容说明只能是字符串类型，请正确使用');
        }
        if (is_array($str)) {
            $str = json_encode($str);
        } elseif (is_object($str)) {
            $str = '[' . serialize($str) . ']';
        }
        file_put_contents($path . $dir . date('Ymd') . $filename . '.log', '[' . date('Y-m-d H:i:s') . '] ' . $filename . ' ' . $type . ' ' . $key .' '. $str . "\r\n", FILE_APPEND | LOCK_EX);
    }

    protected static function mklogdir()
    {
        if (!is_dir(self::$path)) {
            @mkdir(self::$path, 0777, true);
        }
    }
}
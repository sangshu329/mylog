<?php
/* 注意目录路径问题 */
function mylog($key, $value)
{
    if(is_array($value) || is_object($value)) {
        $value = serialize($value);
    }
    if(!is_dir('logs')) @mkdir('logs',0777,true);
    file_put_contents('logs/thiswaplog.log', '[' .     date('Y-m-d H:i:s') . ']  ' . $key . '->' . $value . "\r\n", FILE_APPEND | LOCK_EX);
}
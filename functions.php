<?php
/* 注意目录路径问题 */
function mylog($key, $value, $filename = 'app_log')
{
    $path = str_replace('\\', '/', str_replace('system/common.php', '', __FILE__));
    if (is_array($value) || is_object($value)) {
        $value = serialize($value);
    }
    if (!is_dir('logs')) @mkdir('logs', 0777, true);
    file_put_contents($path . 'logs/' . $filename . date('Ymd') . '.log', '[' . date('Y-m-d H:i:s') . ']  ' . $key . '->' . $value . "\r\n", FILE_APPEND | LOCK_EX);
}
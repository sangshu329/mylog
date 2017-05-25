<?php
/**
 * Created by PhpStorm.
 * User: sien
 * Date: 2017/5/25 0025
 * Time: 23:41
 */
require "Logs.php";
Logs::logger('这是普通字符串内容', '这是内容');
$data = ['test' => 'testcontent', 'test2' => 'testcontent2'];
Logs::logger('这是数组内容', $data);
$obj = new stdClass();
Logs::logger('这是对象内容', $obj);
echo '日志记录成功，欢迎使用';

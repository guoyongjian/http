<?php
/**
 * Created by PhpStorm.
 * User: 郭永健
 * Date: 2017/11/24
 * Time: 23:24
 */

set_time_limit(0);
//@datefmt_set_timezone_id('PRC');
ob_start();
$pad = str_repeat(' ',4000);
echo $pad,'<br/>';
ob_flush();
flush();

$a = 1;
while($a++){
    echo $pad,'<br/>';
    echo $a,'<br/>';
    ob_flush();
    flush();
    sleep(1);
}


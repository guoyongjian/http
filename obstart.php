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
$link = new mysqli('localhost','root','root','mysqli');
$link->set_charset('utf8');
$a = 1;
while($a++){
    $sql = 'select * from admin where is_read=0';
    $query = $link->query($sql);
    $data = $query->fetch_all(MYSQLI_ASSOC);
    $name = array_column($data,'name');
    $id = array_column($data,'id');
//    print_r($id);exit;
    foreach ($name as $v){
        echo $v,'<br/>';
    }
    print_r($id);
//    $sql = 'update admin set is_read=1 where id in (' . implode(",",$id) .')';
    $link->query($sql);
    ob_flush();
    flush();
    sleep(2);
}

